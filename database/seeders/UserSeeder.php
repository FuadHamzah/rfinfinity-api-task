<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Role',
            'username' => 'RF Infinity',
            'email' => 'admin@role.test',
            'password' => bcrypt('11111111')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User Role',
            'username' => 'Fuad',
            'email' => 'user@role.test',
            'password' => bcrypt('11111111')
        ]);

        $user->assignRole('user');
    }
}
