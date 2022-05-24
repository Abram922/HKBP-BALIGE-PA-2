<?php

namespace Database\Seeders;

use App\Models\StatusPemesanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class status_pemesanan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status_pemesanan = [
            [
                'status_pemesanan' => 'New',
                'kode_status' => 1
            ],
            [
                'status_pemesanan' => 'Approve',
                'kode_status' => 2
            ],
            [
                'status_pemesanan' => 'Cancel',
                'kode_status' => 3
            ],
        ];
        foreach ($status_pemesanan as $key => $value) {
            StatusPemesanan::create($value);
        }
    }
}
