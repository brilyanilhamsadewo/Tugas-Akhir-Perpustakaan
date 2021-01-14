<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rak extends Model
{
   //
   use SoftDeletes;
   protected $table ='raks';
   protected $guarded = [];

   public function books()
    {
        return $this->hasMany(Book::class); 
    }
}
