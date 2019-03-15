<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\Functions;
use App\UsersProfile;
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
      // check type user
       $type_user = UsersProfile::getTypeUser(Auth::user()->id);

      return view('frontend.statistics.index', [
        'type_user' => $type_user
      ]);

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
}
