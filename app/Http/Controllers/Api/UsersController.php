<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use NilPortugues\Laravel5\JsonApi\Controller\JsonApiController;

class UsersController extends JsonApiController
{
    public function getDataModel()
    {
        return new User();
    }   
}
