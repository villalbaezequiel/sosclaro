<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Guest extends Model
{
    protected $table = "guest";

    /**
     * Get the guest question for the guest.
     */
    public function guestQuestions()
    {
        return $this->hasMany('App\GuestQuestions');
    }

    /**
     * Get the guest users for the guest.
     */
    public function guestUsers()
    {
        return $this->hasMany('App\GuestUsers');
    }



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
