<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
//    use HasFactory;

    protected $table = 'books';

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genre', 'book_id', 'genre_id');
    }

    protected $fillable = [
        'book'
    ];

    protected $hidden = [
        'id',
        'user_id',
        'created_at',
        'updated_at',
    ];
}
