<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renungan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'title',
        'image',
        'body',
    ];

    protected $with = ['user'];

    // relasi ke table users
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
