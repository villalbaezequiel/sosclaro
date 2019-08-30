<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageCategory extends Model
{
    static public function getName($id)
    {
      $name = ImageCategory::find($id);
      return $name->name;
    }
}
