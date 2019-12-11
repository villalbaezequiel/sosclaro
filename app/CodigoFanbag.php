<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodigoFanbag extends Model
{

    protected $table = 'codigos_fanbag';

    protected $fillable = ['fanbag', 'codigo_fanbag', 'active','expire'];

}
