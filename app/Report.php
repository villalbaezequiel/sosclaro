<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Functions;
use App\Guest;
use App\GuestQuestions;
use App\Dni;
use App\UsersProfile;
use App\Regions;
use App\Agentes;
use App\Products;
use App\Exchanges;

class Report extends Model
{
    static public function export($report, $timestamp){
      
      Excel::create('report_'.$timestamp, function($excel) use ($report){
          
        if($report == 'all_reports'){
          Report::usersExport($excel);
          Report::perfomanceExport($excel);
          Report::exchangesExport($excel);
          Report::productsExport($excel);
          Report::guestsExport($excel);
        }
        if($report == 'users'){
          Report::usersExport($excel);
        }
        if($report == 'perfomances'){
          Report::perfomanceExport($excel);
        }
        if($report == 'exchanges'){
          Report::exchangesExport($excel);
        }
        if($report == 'products'){
          Report::productsExport($excel);
        }
        if($report == 'guests'){
          Report::guestsExport($excel);
        } 
        
      })->store('xls', 'exports');
      
    }
    
    static public function usersExport($excel) {
        $excel->sheet('usuarios', function($sheet){
                
          $users = DB::table('users')
                ->select('users.id',
                  'users.email',
                  'users_profile.date_year as fecha_nacimiento',
                  'users_profile.id_region as region',
                  'users_profile.sexo as genero',
                  'users_profile.id_agente as agente',
                  'users_profile.telephone as telefono',
                  'users_profile.telephone_other as otro_telefono',
                  'users_profile.address as domicilio',
                  'users.created_at as fecha_registro',
                  'users.active as activo')
                ->join('users_profile', 'users_profile.id_user', '=', 'users.id')
                ->get();
                
	  foreach($users as &$user){
            $user->fecha_nacimiento = UsersProfile::getDateYear($user->fecha_nacimiento);
            $user->region = Regions::getName($user->region);
            $user->genero = ($user->genero == 'male' ? 'Masculino' : 'Femenino');
            $user->agente = Agentes::getName($user->agente);
            $user->fecha_registro = Functions::getDate($user->fecha_registro);
            $user->activo = ($user->activo == 0 ? 'No' : 'Si');
            
            $user->dni = Dni::getDni($user->id);
            $user->nombre_completo = Dni::getName($user->id);
            $user->puntos_historicos = Dni::getPuntosHistorical($user->id);
            $user->puntos_disponibles_hoy = Dni::getPuntos($user->id);
	  }
          
          $sheet->fromArray(json_decode( json_encode($users), true));
 
        });
    }
    
    static public function perfomanceExport($excel) {
        $excel->sheet('desempeno', function($sheet){
                
          $users = DB::table('users')
                ->select('users.id',
                  'users.email',
                  'users_profile.date_year as fecha_nacimiento',
                  'users_profile.id_region as region',
                  'users_profile.sexo as genero',
                  'users_profile.id_agente as agente',
                  'users_profile.telephone as telefono',
                  'users_profile.telephone_other as otro_telefono',
                  'users_profile.address as domicilio',
                  'users.created_at as fecha_registro',
                  'users.active as activo',
                        
                  'desempeno.indicador_1 as desempeno_indicador_1',
                  'desempeno.indicador_2 as desempeno_indicador_2',
                  'desempeno.asunto as desempeno_asunto',
                  'desempeno.puntos as desempeno_puntos',
                  'desempeno.promedio as desempeno_promedio',
                  'desempeno.total as desempeno_total',
                  'desempeno.created_at as desempeno_fecha_registro')
                ->join('users_profile', 'users_profile.id_user', '=', 'users.id')
                ->join('desempeno', 'desempeno.id_user', '=', 'users.id')
                ->get();
                
	  foreach($users as &$user){
            $user->fecha_nacimiento = UsersProfile::getDateYear($user->fecha_nacimiento);
            $user->region = Regions::getName($user->region);
            $user->genero = ($user->genero == 'male' ? 'Masculino' : 'Femenino');
            $user->agente = Agentes::getName($user->agente);
            $user->fecha_registro = Functions::getDate($user->fecha_registro);
            $user->activo = ($user->activo == 0 ? 'No' : 'Si');
            $user->desempeno_fecha_registro = Functions::getDate($user->desempeno_fecha_registro);
            
            $user->dni = Dni::getDni($user->id);
            $user->nombre_completo = Dni::getName($user->id);
            $user->puntos_historicos = Dni::getPuntosHistorical($user->id);
            $user->puntos_disponibles_hoy = Dni::getPuntos($user->id);
	  }
          
          $sheet->fromArray(json_decode( json_encode($users), true));
 
        });
    }
    
    static public function exchangesExport($excel) {
        $excel->sheet('canjes', function($sheet){
                
          $users = DB::table('users')
                ->select('users.id',
                  'exchanges.id as id_canje',
                  'users.email',
                  'users_profile.date_year as fecha_nacimiento',
                  'users_profile.id_region as region',
                  'users_profile.sexo as genero',
                  'users_profile.id_agente as agente',
                  'users_profile.telephone as telefono',
                  'users_profile.telephone_other as otro_telefono',
                  'users_profile.address as domicilio',
                  'users.created_at as fecha_registro',
                  'users.active as activo',
                   
                  'products.name as canje_producto_nombre',
                  'products.codigo as canje_producto_codigo',
                  'exchanges.nickname_ML as nickname_ML',
                  'exchanges.email_ML as email_ML',
                  'exchanges.status as canje_estado',
                  'exchanges.puntos_before_exchange as puntos_antes_del_canje',
                  'exchanges.created_at as canje_fecha_registro')
                ->join('users_profile', 'users_profile.id_user', '=', 'users.id')
                ->join('exchanges', 'exchanges.id_user', '=', 'users.id')
                ->join('products', 'products.id', '=', 'exchanges.id_product')
                ->get();

	  foreach($users as &$user){

            $user->fecha_nacimiento = UsersProfile::getDateYear($user->fecha_nacimiento);
            $user->region = Regions::getName($user->region);
            $user->genero = ($user->genero == 'male' ? 'Masculino' : 'Femenino');
            $user->agente = Agentes::getName($user->agente);
            $user->fecha_registro = Functions::getDate($user->fecha_registro);
            $user->activo = ($user->activo == 0 ? 'No' : 'Si');
            $user->voucher = ($user->voucher ? 'Si' : 'No');
            $user->canje_estado = Exchanges::getStatus($user->canje_estado);
            $user->canje_fecha_registro = Functions::getDate($user->canje_fecha_registro);
            $user->dni = Dni::getDni($user->id);
            $user->nombre_completo = Dni::getName($user->id);
            $user->puntos_historicos = Dni::getPuntosHistorical($user->id);
            $user->puntos_disponibles_hoy = Dni::getPuntos($user->id);

            /*
            if($userId == $user->id){
              //$user->puntos_historicos = $puntos_actuales_user;
              $user->puntos_historicos = Dni::getPuntosHistorical($user->id);
              $puntos_actuales_user = ( $puntos_actuales_user - Products::getValuePuntosByCode($user->canje_producto_codigo) );
            } else {
              $user->puntos_historicos = Dni::getPuntosHistorical($user->id);
              $puntos_actuales_user = ( Dni::getPuntosHistorical($user->id) - Products::getValuePuntosByCode($user->canje_producto_codigo) );  
            }            
            $user->puntos_actuales = $puntos_actuales_user;

            $user->puntos_hoy = \App\Dni::getPuntos($user->id);


            $userId = $user->id; */
    }

          $finish = json_decode( json_encode($users), true);
          
          usort($finish, function($a, $b) {
              return $b['id_canje'] <=> $a['id_canje'];
          });

          $sheet->fromArray($finish);
 
        });
    }
    
    static public function productsExport($excel) {
        $excel->sheet('productos_stock', function($sheet){
             
          // TODOS LOS PRODUCTO DEBEN TENER, AUNQUE SEA, UN STOCK INCIAL
          $products = DB::table('products_history_stock')
                ->select('products_history_stock.stock as stock_inicial',
                  'products_history_stock.created_at as stock_inicial_fecha_creacion',
                  'products.name as producto_nombre',
                  'products.codigo as producto_codigo',
                  'products.id_category as producto_categoria',
                  'products.price as producto_valor',
                  'products.stock as producto_stock_actual',
                  'products.notification as producto_limite_notificacion',
                  'products.active as producto_activo',
                  'products.created_at as producto_fecha_creacion')
                ->join('products', 'products.id', '=', 'products_history_stock.id_product')
                ->get();
                
	  foreach($products as &$product){
            $product->stock_inicial_fecha_creacion = Functions::getDate($product->stock_inicial_fecha_creacion);
            $product->producto_categoria = Categories::getNameCategory($product->producto_categoria);
            $product->producto_activo = ($product->producto_activo == 0 ? 'No' : 'Si');;
            $product->producto_fecha_creacion = Functions::getDate($product->producto_fecha_creacion);
	  }
          
          $sheet->fromArray(json_decode( json_encode($products), true));
 
        });
    }
    
    static public function guestsExport($excel) {
        
      $allGuests = Guest::all();
      foreach($allGuests as $guest){
          
        $excel->sheet('encuesta_'.$guest->name, function($sheet) use ($guest){
                
          $users = DB::table('users')
                ->select('users.id',
                  'users.email',
                  'users_profile.date_year as fecha_nacimiento',
                  'users_profile.id_region as region',
                  'users_profile.sexo as genero',
                  'users_profile.id_agente as agente',
                  'users_profile.telephone as telefono',
                  'users_profile.telephone_other as otro_telefono',
                  'users_profile.address as domicilio',
                  'users.created_at as fecha_registro',
                  'users.active as activo',
                        
                  'guest.id as encuesta_id',
                  'guest.name as encuesta_nombre',
                  'guest.description as encuesta_descripcion',
                  'guest.puntos as encuesta_puntos',
                  'guest.active as encuesta_activo',
                  'guest_users.results as encuesta_resultados',
                  'guest_users.created_at as encuesta_fecha_registro')
                ->join('users_profile', 'users_profile.id_user', '=', 'users.id')
                ->join('guest_users', 'guest_users.id_user', '=', 'users.id')
                ->join('guest', 'guest.id', '=', 'guest_users.id_guest')
                ->where('guest.id', '=', $guest->id)
                ->get();
                
	  foreach($users as &$user){
            $user->fecha_nacimiento = UsersProfile::getDateYear($user->fecha_nacimiento);
            $user->region = Regions::getName($user->region);
            $user->genero = ($user->genero == 'male' ? 'Masculino' : 'Femenino');
            $user->agente = Agentes::getName($user->agente);
            $user->fecha_registro = Functions::getDate($user->fecha_registro);
            $user->activo = ($user->activo == 0 ? 'No' : 'Si');
            
            $questions_guest = GuestQuestions::where('id_guest', '=', $user->encuesta_id)->get();
            $resultados = json_decode($user->encuesta_resultados, 1);
            
            if(!empty($questions_guest)){
              foreach($questions_guest as $key => $question){
                if(isset($resultados[$key])){
                  $questionName = $question->question;
                  $result = $resultados[$key];
                  $value = '';
                  foreach($result as $resultKey => $resultVal){
                    $value = $resultVal; 
                  }
                  $user->$questionName = $value;
                }
              }
            }
            
            $user->encuesta_activo = ($user->encuesta_activo == 0 ? 'No' : 'Si');
            $user->encuesta_fecha_registro = Functions::getDate($user->encuesta_fecha_registro);
            
            $user->dni = Dni::getDni($user->id);
            $user->nombre_completo = Dni::getName($user->id);
            $user->puntos_historicos = Dni::getPuntosHistorical($user->id);
            $user->puntos_actuales = Dni::getPuntos($user->id);
            
            //delete results in format json and "encuesta_id"
            unset($user->encuesta_resultados);
            unset($user->encuesta_id);
	  }
          
          $sheet->fromArray(json_decode( json_encode($users), true));
 
        });
      }
    }
}
