<?php

namespace Database\Seeders;

use App\Models\Aula;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bookingaula = [
            [
                'name' => 'abram',
                'email' => 'abram@gmail.com',
                'nomor_telepon' => '123456789010',
                'tanggal_mulai' => '2022/02/12',
                'tanggal_selesai' => '2022/02/13',
                'total' => '2000000',
                'alamat' => 'parsoburan',
                'pesan' => 'uji coba pesan',
                'user_id' => 8,
                'status_id' => 0,
                'keperluan' => 'Pesta Pernikahan'
            ],

            [
                'name' => 'abram',
                'email' => 'abram@gmail.com',
                'nomor_telepon' => '123456789010',
                'tanggal_mulai' => '2022/02/12',
                'tanggal_selesai' => '2022/02/13',
                'total' => '2000000',
                'alamat' => 'parsoburan',
                'pesan' => 'uji coba pesan',
                'user_id' => 9,
                'status_id' => 1,
                'keperluan' => 'Pesta Pernikahan'
            ],
            [
                'name' => 'abram',
                'email' => 'abram@gmail.com',
                'nomor_telepon' => '123456789010',
                'tanggal_mulai' => '2022/02/12',
                'tanggal_selesai' => '2022/02/13',
                'total' => '2000000',
                'alamat' => 'parsoburan',
                'pesan' => 'uji coba pesan',
                'user_id' => 9,
                'keperluan' => 'Pesta Pernikahan',
                'status_id' => 2,
            ],


        ];
        foreach ($bookingaula as $key => $value) {
            Aula::create($value);
        }
    }
}
