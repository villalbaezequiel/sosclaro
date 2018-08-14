<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Functions extends Model
{
    static public function print_x($array) {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
    
    static public function getActive($param) {
        if($param == 1){
            echo "Si";
        } elseif($param == 0){
            echo "No";
        }
    }
    
    static public function getDate($param) {
        $date = explode("-", substr("$param", 0, -9));
        return $date[2]."/".$date[1]."/".$date[0];
    }
    
    static public function sendMail($template = 'emails.default', $data, $callback){
        Mail::send($template, $data, $callback);
    }
    
    static public function checkPortMail($mail) {
        $results = array();
        
      if(@fsockopen($mail, 25, $errno, $errstr, 2)) {
        $results[] = array("port-25" => "abierto");
      } else {
        $results[] = array("port-25" => "cerrado", "error" => ($errno.$errstr) );
      }
      
      if(@fsockopen($mail, 587, $errno, $errstr, 2)){
        $results[] = array("port-587" => "abierto");
      } else {
        $results[] = array("port-587" => "cerrado", "error" => ($errno.$errstr) );
      }
      
      if(@fsockopen("ssl://".$mail, 465, $errno, $errstr, 2)) {
	$results[] = array("port-465-ssl" => "abierto");
      } else {
        $results[] = array("port-465-ssl" => "cerrado", "error" => ($errno.$errstr) );
      }
      
      if(@fsockopen("tls://".$mail, 465, $errno, $errstr, 2)) {
	$results[] = array("port-465-tls" => "abierto");
      } else {
        $results[] = array("port-465-tls" => "cerrado", "error" => ($errno.$errstr) );
      }
      
      dd($results);
    }
    
    static public function getGender($gender) {
      if($gender == "male"){
        echo "masculino";
      } elseif($gender == "female"){
        echo "femenino";
      }
    }
    
    static public function getMonths() {
      $months = array(
        '1' => 'Enero',
        '2' => 'Febrero',
        '3' => 'Marzo',
        '4' => 'Abril',
        '5' => 'Mayo',
        '6' => 'Junio',
        '7' => 'Julio',
        '8' => 'Agosto',
        '9' => 'Septiembre',
        '10' => 'Octubre',
        '11' => 'Noviembre',
        '12' => 'Diciembre'
      );
      return $months;
    }
    
    static public function getNameMonth($id_month) {
      $months = Functions::getMonths();
      $name_month = '';
      foreach($months as $key => $value){
          if($key == $id_month){
            $name_month = $value;
          }
      }
      return $name_month;
    }
}
