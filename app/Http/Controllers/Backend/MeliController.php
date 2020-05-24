<?php
namespace App\Http\Controllers\Backend;

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


class MeliController extends Controller
{
    public function authentication()
    {
        header("Access-Control-Allow-Headers : Content-Type");
        header("Access-Control-Allow-Methods : POST, OPTIONS");
        $meli = new Meli(env('App_ID'), env('Secret_Key'));
        return $meli->getAuthUrl("http://staging.mejoresvendedores.com.ar/admin/meli/redirect", Meli::$AUTH_URL['MLA']);

    }

    public function redirect(Request $request)
    {
        $meli = new Meli(env('App_ID'), env('Secret_Key'));
        $user = $meli->authorize($_GET['code'], "http://staging.mejoresvendedores.com.ar/admin/meli/redirect");
        $params = array('access_token' => $user['body']->access_token);
        $result = $meli->get('/users/me', $params);

        Session::put('ml', $result['body']);

        $ml = Session::get('ml');

    }

}