<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gedung extends Model
{
    use HasFactory;

    protected $fillable = [
        'Gedung',
        'Harga_Sewa',
        'Biaya_Prokes',
        'Total',
        'user_id',
        'gambar_gedung',
        'keterangan'
    ];

    protected $with = ['user'];

    public function Aula()
    {
        return $this->hasMany(Aula::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
