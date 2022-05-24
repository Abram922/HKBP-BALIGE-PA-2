<?php

namespace App\Models;

use Database\Seeders\status_pemesanan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'name',
        'nomor_telepon',
        'tanggal_mulai',
        'tanggal_selesai',
        'total',
        'pesan',
        'alamat',
        'user_id',
        'keperluan',
        'kode_status',
        'status_id'
    ];

    protected $with = ['user'];
    protected $dates = ['tanggal_mulai', 'tanggal_selesai'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function booking_status()
    {
        return $this->belongsTo(status_pemesanan::class, 'status_id');
    }
}
