<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\Functions;
use App\UsersProfile;
use App\User;
use App\Dni;
use App\Results;
use App\BonusTrack;
use App\Exchanges;
use App\Products;
use App\Guest;
use App\GuestUsers;
use Auth;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $type_user = UsersProfile::getTypeUser(Auth::user()->id);
      $type_user_the = UsersProfile::getTypeUserThe(Auth::user()->id);

      if($type_user == 'SUPERVISOR' || $type_user == 'supervisor' || $type_user == 'Supervisor'
                || $type_user == 'GERENTE' || $type_user == 'gerente' || $type_user == 'Gerente')
      {
          $users = UsersProfile::getListUsersByTypeUser($type_user, Auth::user()->id);

          return view('frontend.statistics.index', [
            'type_user' => $type_user,
            'type_user_the' => $type_user_the,
            'id_user' => Auth::user()->id,
            'count_users' => count($users)
          ]);

      } else {
        return redirect('/inicio');
      }
    }

    public function getStatisticstUsersCountMonth()
    {
      try {
        $results = array();
        $role_user = UsersProfile::getTypeUser(Auth::user()->id);

        foreach(UsersProfile::getCountUsersByMonths($role_user, Auth::user()->id) as $month => $count_user){
          $results[] = array("month" => $month, "count" => $count_user);
        }
        return response()->json(['results' => $results]);

      } catch (\Exception $e) {

      }

    }

    /*
      Logica: En RESULTDOS. Se debe calcular todos los puntos que se sumaron para sus VENDEDEDORES asociados durante sus meses.
      Ejemplo: array("mayo" => 100, "junio" => 129)
    */

    public function getResults($id_user, $type_user)
    {
      try {

        $months = array('1' => '','2' => '','3' => '','4' => '','5' => '','6' => '','7' => '',
                        '8' => '','9' => '','10' => '', '11' => '','12' => '');
        $users = UsersProfile::getListUsersByTypeUser($type_user, $id_user);

        foreach ($months as $key => $month)
        {
          $count = 0;
          $query = Results::select('puntos')
                    ->whereIn('id_user', $users)
                    ->where('month', $key)
                    ->get();

          foreach ($query as $val)
          {
            $count += $val->puntos;
          }

          $months[$key] = $count;
        }

        return response()->json(['results' => $months]);

      } catch (\Exception $e) {
        if(\Config::get('app.debug'))
          $message = 'ERROR('.$e->getLine().'): '.$e->getMessage();
        else
          $message = 'Se ha producido un error. Por favor intente nuevamente.';

        $respuesta = array(
                'estado' => false,
                'mensaje' => $message
        );
        return \Response::json($respuesta);
      }

    }

    /*
      Logica: En BonusTrack. Se debe calcular todos los puntos que se sumaron para sus VENDEDEDORES asociados durante sus meses.
      Ejemplo: array("mayo" => 100, "junio" => 129)
    */

    public function getBonusTrack($id_user, $type_user)
    {
      try {

        $months = array('1' => '','2' => '','3' => '','4' => '','5' => '','6' => '','7' => '',
                        '8' => '','9' => '','10' => '', '11' => '','12' => '');
        $users = UsersProfile::getListUsersByTypeUser($type_user, $id_user);

        foreach ($months as $key => $month)
        {
          $count = 0;
          $query = BonusTrack::select('puntos')
                    ->whereIn('id_user', $users)
                    ->where('month', $key)
                    ->get();

          foreach ($query as $val)
          {
            $count += $val->puntos;
          }

          $months[$key] = $count;
        }

        return response()->json(['results' => $months]);

      } catch (\Exception $e) {
        if(\Config::get('app.debug'))
          $message = 'ERROR('.$e->getLine().'): '.$e->getMessage();
        else
          $message = 'Se ha producido un error. Por favor intente nuevamente.';

        $respuesta = array(
                'estado' => false,
                'mensaje' => $message
        );
        return \Response::json($respuesta);
      }

    }

    public function exportResultsBonusTrack(Request $resquest)
    {
      try {


      } catch (\Exception $e) {
        if(\Config::get('app.debug'))
          $message = 'ERROR('.$e->getLine().'): '.$e->getMessage();
        else
          $message = 'Se ha producido un error. Por favor intente nuevamente.';

        $respuesta = array(
                'estado' => false,
                'mensaje' => $message
        );
        return \Response::json($respuesta);
      }
    }

    /*
      Logica: El top 10 de tus VENDEDEDORES relacionados. Puntos Actual o Historial.
      Ejemplo: { 0 => array("Mauricio Villalba", 340), 1 => array("Ezequiel Villalba", 200) }
    */

    public function getTopThen($id_user, $type_user, $type_puntos)
    {
      try {

        $users = UsersProfile::getListUsersByTypeUser($type_user, $id_user);
        $results = array();

        if($type_puntos == 'actual'){

          foreach ($users as $key => $val) {
            $getPuntos = Dni::getPuntos($val);
            $getName = Dni::getName($val);

            array_push($results, array('name' => $getName, 'puntos' => $getPuntos));
          }

        } elseif($type_puntos == 'history'){

          foreach ($users as $key => $val) {
            $getPuntos = Dni::getPuntosHistorical($val);
            $getName = Dni::getName($val);

            array_push($results, array('name' => $getName, 'puntos' => $getPuntos));
          }

        }

        return response()->json(['results' => array_slice(Functions::array_orderby($results, 'puntos', SORT_DESC), 0, 10)]);

      } catch (\Exception $e) {
        if(\Config::get('app.debug'))
          $message = 'ERROR('.$e->getLine().'): '.$e->getMessage();
        else
          $message = 'Se ha producido un error. Por favor intente nuevamente.';

        $respuesta = array(
                'estado' => false,
                'mensaje' => $message
        );
        return \Response::json($respuesta);
      }

    }

    /*
      Logica:
      Ejemplo:
    */

    public function getExchanges($id_user, $type_user)
    {
      try {

        $users = UsersProfile::getListUsersByTypeUser($type_user, $id_user);
        $exchanges = array();

        foreach ($users as $key => $val) {

          $query = Exchanges::select('id_user','id_product')
                            ->where('id_user', $val)
                            ->get();

          if(isset($query[0])){
            array_push($exchanges, array('product' => Products::getName($query[0]->id_product), 'count' => count($query)));
          }
        }

        for($i=0;$i<count($exchanges);$i++){
          for($j=$i+1; $j<count($exchanges);$j++){
            if($exchanges[$i]['product'] == $exchanges[$j]['product']){
              $exchanges[$i]['count'] = $exchanges[$i]['count']+$exchanges[$j]['count'];
              $exchanges[$j]['count'] = 0;
            }
          }
        }

        return response()->json(['results' => $exchanges]);

      } catch (\Exception $e) {
        if(\Config::get('app.debug'))
          $message = 'ERROR('.$e->getLine().'): '.$e->getMessage();
        else
          $message = 'Se ha producido un error. Por favor intente nuevamente.';

        $respuesta = array(
                'estado' => false,
                'mensaje' => $message
        );
        return \Response::json($respuesta);
      }

    }

    /*
      Logica: El top 10 de tus VENDEDEDORES relacionados. Puntos Actual o Historial.
      Ejemplo: { 0 => array("Mauricio Villalba", 340), 1 => array("Ezequiel Villalba", 200) }
    */
    public function getGuests($id_user, $type_user)
    {
      try {

        $users = UsersProfile::getListUsersByTypeUser($type_user, $id_user);
        $results = array();

        foreach(Guest::all() as $guest){
          $results[$guest->id] = array("completas" => 0, "incompletas" => 0);

          foreach ($users as $key => $val) {
            $query = GuestUsers::where('id_user', $val)
                              ->where('id_guest', $guest->id)
                              ->get();

            if(isset($query[0])){
              $results[$guest->id]['completas'] += 1;
            } else {
              $results[$guest->id]['incompletas'] += 1;
            }

          }
        }

        foreach ($results as $key => &$val) {
          $val['guest'] = Guest::getNameGuest($key);
          $val['completas'] = ($val['completas'] * 100) / count($users);
          $val['incompletas'] = ($val['incompletas'] * 100) / count($users);
        }

        return response()->json(['results' => $results]);

      } catch (\Exception $e) {
        if(\Config::get('app.debug'))
          $message = 'ERROR('.$e->getLine().'): '.$e->getMessage();
        else
          $message = 'Se ha producido un error. Por favor intente nuevamente.';

        $respuesta = array(
                'estado' => false,
                'mensaje' => $message
        );
        return \Response::json($respuesta);
      }

    }

}
