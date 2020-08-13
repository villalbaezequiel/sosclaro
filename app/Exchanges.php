<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Exchanges extends Model
{
    protected $table = 'exchanges';

    /**
     * Get the user that owns the exchange.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the product that owns the exchange
     */
    public function product()
    {
        return $this->belongsTo('App\Products');
    }

    static public function getStatus($status) {
        if($status == 0){
            return "Pendiente de acreditación";
        } elseif($status == 1){
            return "Entregado";
        } elseif ($status == 2) {
            return "Completo (Recepción confirmada)";
        }
    }

    static public function getCountPendientes($id) {
        return Exchanges::where('id_user', '=', $id)
            ->where('status', '<>', 2)->count();
    }

}
