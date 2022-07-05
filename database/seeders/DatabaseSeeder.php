<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Berita;
use App\Models\gedung;
use App\Models\StatusPemesanan;
use Illuminate\Database\Seeder;

use App\Models\metodepembayaran;
use App\Models\statuspembayaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Berita::factory(10)->create();
        $level = [
            [
                'level' => 'pendeta'
            ],
            [
                'level' => 'bph'
            ],
            [
                'level' => 'user'
            ],
        ];
        foreach ($level as $key => $value) {
            Role::create($value);
        }

        $bayar = [
            [
                'kode_metode' => 1,
                'metodepembayaran' => 'cash'
            ],
            [
                'kode_metode' => 2,
                'metodepembayaran' => 'credit'
            ],
        ];
        foreach ($bayar as $key => $value) {
            metodepembayaran::create($value);
        }

        $status_bayar = [
            [
                'status_pembayaran' => 'Belum Mengirim Bukti',
                'kode_status' => 1
            ],
            [
                'status_pembayaran' => 'Sedang Diperiksa',
                'kode_status' => 2
            ],
            [
                'status_pembayaran' => 'Lunas',
                'kode_status' => 3
            ],
            [
                'status_pembayaran' => 'Pembayaran DP Berhasil Lanjutkan Pembayaran Pelunasan',
                'kode_status' => 4
            ],
            [
                'status_pembayaran' => 'Menunggu Mengirimkan Pelunasan',
                'kode_status' => 5
            ],
            [
                'status_pembayaran' => 'Menunggu Konfirmasi Pelunasan',
                'kode_status' => 6
            ],
            [
                'status_pembayaran' => ' Bukti DP Salah, Periksa dan Kirim Kembali!!',
                'kode_status' => 7
            ],
            [
                'status_pembayaran' => ' Bukti Pelunasan Salah,Periksa dan Kirim Kembali!!',
                'kode_status' => 8
            ],
            [
                'status_pembayaran' => ' Bukti Pembayaran Salah,Periksa dan Kirim Kembali!!',
                'kode_status' => 9
            ],
            [
                'status_pembayaran' => 'di cancel',
                'kode_status' => 10
            ],
            
            
            
        ];
        foreach ($status_bayar as $key => $value) {
            statuspembayaran::create($value);
        }
        
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
            [
                'status_pemesanan' => 'Lunas',
                'kode_status' => 4
            ],
            [
                'status_pemesanan' => 'DP',
                'kode_status' => 5
            ],
        ];
        foreach ($status_pemesanan as $key => $value) {
            StatusPemesanan::create($value);
        }

        // $gedung = [
        //     [
        //         'Gedung' => 'aula lt 1',
        //         'Harga_Sewa' => 123,
        //         'Biaya_Prokes' => 123,
        //         'Total' =>  246,
        //         'user_id' => 4
        //     ],
        //     [
        //         'Gedung' => 'gereja bolon',
        //         'Harga_Sewa' => 123,
        //         'Biaya_Prokes' => 123,
        //         'Total' =>  246,
        //         'user_id' => 4
        //     ],
        // ];
        // foreach ($gedung as $key => $value) {
        //     gedung::create($value);
        // }



        $user = [
            [
                'name' => 'superadmin',
                'email' => 'superadmin@gmail.com',
                'username' => 'superadmin',
                'phoneno' => '123456789010',
                'level_user' => 1,
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'pendeta',
                'email' => 'pendeta@gmail.com',
                'username' => 'pendeta',
                'phoneno' => '123456789010',
                'level_user' => 1,
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'admin1',
                'email' => 'admin1@gmail.com',
                'username' => 'admin1',
                'phoneno' => '123456789011',
                'level_user' => 2,
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'admin2',
                'email' => 'admin2@gmail.com',
                'username' => 'admin2',
                'phoneno' => '123456789012',
                'level_user' => 2,
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'admin3',
                'email' => 'admin3@gmail.com',
                'username' => 'admin3',
                'phoneno' => '123456789013',
                'level_user' => 2,
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'admin4',
                'email' => 'admin4@gmail.com',
                'username' => 'admin4',
                'phoneno' => '123456789014',
                'level_user' => 2,
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'admin5',
                'email' => 'admin5@gmail.com',
                'username' => 'admin5',
                'phoneno' => '123456789015',
                'level_user' => 2,
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'username' => 'user1',
                'phoneno' => '123456789011',
                'level_user' => 3,
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'user2',
                'email' => 'user2@gmail.com',
                'username' => 'user2',
                'phoneno' => '123456789011',
                'level_user' => 3,
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'user3',
                'email' => 'user3@gmail.com',
                'username' => 'user3',
                'phoneno' => '123456789011',
                'level_user' => 3,
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'user4',
                'email' => 'user4@gmail.com',
                'username' => 'user4',
                'phoneno' => '123456789011',
                'level_user' => 3,
                'password' => bcrypt('123456')
            ],

        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
