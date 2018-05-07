<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Guest;
use App\GuestQuestions;

class Guest extends Model
{
    protected $table = "guest";
    
    static public function getNameGuest($id_guest) {
        $guest = Guest::find($id_guest);
        return $guest->name; 
    }
    
    static public function getPuntos($id_guest) {
        $guest = Guest::find($id_guest);
        return $guest->puntos; 
    }
    
    static public function getCountQuestions($id_guest) {
        $guestCount = GuestQuestions::where('id_guest', $id_guest)->count();
        return $guestCount; 
    }
}
