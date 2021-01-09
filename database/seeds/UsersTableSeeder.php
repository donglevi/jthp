<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id_nv' => '000249',
            'name' => 'Đông',
            'email' => 'dong.pham@jtexpress.vn',
            'password'=> bcrypt('123123'),
            'status' => 1,
            'first_login' => 1,
            'level' => 1,
        ]);
    }
}
