<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;
    protected $guarded =[];
    public $timestamps = false;
    public function books()
    {
        return $this->hasMany(Book::class); 
    }
}
