<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\Role;
use App\Models\User;

use Illuminate\Database\Seeder;
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
