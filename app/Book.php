<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class);
    }

    public function rak()
    {
        return $this->belongsTo(Rak::class);
    }

    public function getCover()
    {
        if (substr($this->cover,0,5) == "https") {
            return $this->cover;
        }

        if ($this->cover) {
            return asset($this->cover);
        }

        return 'https://via.placeholder.com/150x200.png?text=No+Cover';
    }

    public function borrowed()
    {
        return $this->belongsToMany(Member::class, 'peminjamans')->withTimestamps();
    }

    public function scopeIsStillBorrow($query, $bookId)
    {
        return $query->where('books.id', $bookId)
                     ->where('returned_at', null)
                     ->count()>0;
    }
}
