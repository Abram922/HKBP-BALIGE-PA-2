<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailpemesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_aula'
    ];

    public function aula()
    {
        return $this->belongsTo(User::class, 'id_aula');
    }


}
