<?php

namespace App\Models\Json;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['book'];

    protected $hidden = ['id', 'user_id', 'created_at', 'updated_at'];
}
