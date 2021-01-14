<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penerbit extends Model
{
    //
    use SoftDeletes;
    protected $table = 'penerbits';
    protected $guarded = [];

    public function books()
    {
        return $this->hasMany(Book::class); 
    }
}
