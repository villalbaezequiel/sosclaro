<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Frontend\CatalogueController;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Functions;
use App\Dni;
use App\Exchanges;
use App\Products;
use App\User;
use App\Meli;
use GuzzleHttp;


class MeliController extends Controller
{
    private $catalogoController;

    /**
     * MeliController constructor.
     * @param CatalogueController $catalogoController
     */
    public function __construct(CatalogueController $catalogoController)
    {
        $this->catalogoController = $catalogoController;

    }

    public function authentication(Request $request)
    {
        $data = $request->all();
        Session::put('product', $data);

        header("Access-Control-Allow-Headers : Content-Type");
        header("Access-Control-Allow-Methods : POST, OPTIONS");
        $meli = new Meli(env('App_ID'), env('Secret_Key'));
        $url = $meli->getAuthUrl("https://staging.mejoresvendedores.com.ar/admin/meli/redirect", Meli::$AUTH_URL['MLA']);

        return Redirect::to($url);

    }

    public function redirect(Request $request)
    {
        $meli = new Meli(env('App_ID'), env('Secret_Key'));
        $user = $meli->authorize($_GET['code'], "https://staging.mejoresvendedores.com.ar/admin/meli/redirect");
        $params = array('access_token' => $user['body']->access_token);
        $ml = $meli->get('/users/me', $params);

        $product = Session::get('product');

        return $this->catalogoController->productML($product, $ml['body']);

    }

}