<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PinjamHistori extends Model
{
    protected $table = 'peminjamans';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'id', 'admin_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class);
    }
    
    public function rak()
    {
        return $this->belongsTo(Rak::class);
    }

    public function pengembalian()
    {
        return $this->belongsTo(Pengembalian::class);
    }

    public function pengembalians()
    {
        return $this->hasMany(Pengembalian::class); 
    }

    public function scopeIsBorrowed($query)
    {
        return $query->where('status_pinjam', 0);
    }

    public function scopeIsHistoryBorrow($query)
    {
        return $query->where('status_pinjam', 1);
    }
}
