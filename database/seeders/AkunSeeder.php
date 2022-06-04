<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'admin',
                'name'=>'ini akun Admin',
                'email'=>'admin@mail.com',
                'level'=>'admin',
                'password'=> bcrypt('123456'),
            ],
            [
                'username' => 'pimpinan',
                'name'=>'ini akun User (non admin)',
                'email'=>'pimpinan@mail.com',
                'level'=>'pimpinan',
                'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
