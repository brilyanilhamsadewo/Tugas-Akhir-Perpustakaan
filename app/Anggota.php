<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggota extends Model
{
    //
    protected $tables = 'anggotas';
    protected $guarded =[];
    use SoftDeletes;

    public function books()
    {
        return $this->hasMany(Book::class); 
    }
}
