<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'excerpt',
        'body',
        'user_id',
        'image'
    ];

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function scopeFilter($query, array $filters)  // untuk serach
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return   $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });
    }
}
