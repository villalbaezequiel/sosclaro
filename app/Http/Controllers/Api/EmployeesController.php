<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Employees;
use App\Orders;
use NilPortugues\Laravel5\JsonApi\Controller\JsonApiController;
use NilPortugues\Laravel5\JsonApi\Eloquent\EloquentHelper;
use NilPortugues\Api\JsonApi\Http\Factory\RequestFactory;
use NilPortugues\Laravel5\JsonApi\Actions\ListResource;

class EmployeesController extends JsonApiController
{
    /**
     * Return the Eloquent model that will be used 
     * to model the JSON API resources. 
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getDataModel()
    {
        return new Employees();
    }    
    
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getOrdersByEmployee(Request $request)
    {       
        $apiRequest = RequestFactory::create();
        $page = $apiRequest->getPage();

        if (!$page->size()) {
            $page->setSize(10); //Default elements per page
        }

        $resource = new ListResource(
            $this->serializer,
            $page,
            $apiRequest->getFields(),
            $apiRequest->getSort(),
            $apiRequest->getIncludedRelationships(),
            $apiRequest->getFilters()
        );
        
        $totalAmount = function() use ($request) {
            $id = (new Orders())->getKeyName();
            return Orders::query()
                ->where('employee_id', '=', $request->employee_id)
                ->get([$id])
                ->count();
        };

        $results = function()  use ($request) {
            return EloquentHelper::paginate(
                $this->serializer,
                Orders::query()
                    ->where('employee_id', '=', $request->employee_id)
            )->get();
        };

        $uri = route('employees.orders', ['employee_id' => $request->employee_id]);
        
        return $resource->get($totalAmount, $results, $uri, Orders::class);
    }
}