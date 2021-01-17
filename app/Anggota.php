<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggota extends Model
{
    use SoftDeletes;
    protected $table = 'anggotas';
    protected $guarded = [];

    public function pinjam_historys()
    {
        return $this->hasMany(PinjamHistori::class); 
    }
}
