<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $table = 'pengembalians';

    protected $guarded = [];

    public function pinjamhistori()
    {
        return $this->belongsTo(PinjamHistori::class);
    }

    public function pinjamhistoris()
    {
        return $this->hasMany(PinjamHistori::class); 
    }
}
