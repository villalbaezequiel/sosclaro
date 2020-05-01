<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
        $meli = new Meli(env('App_ID'), env('Secret_Key'));
        $redirectUrl = $meli->getAuthUrl("http://localhost:8000/admin/meli/redirect", Meli::$AUTH_URL['MLA']);
        return redirect($redirectUrl);
    }

    public function redirect(Request $request)
    {
        $meli = new Meli(env('App_ID'), env('Secret_Key'));
        $user = $meli->authorize($_GET['code'], "http://localhost:8000/admin/meli/redirect");
        $params = array('access_token' => $user['body']->access_token);
        $result = $meli->get('/users/me', $params);

        //$result['body]->email;

    }

}