<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Juan Frido',
            'role_id' =>'1',
            'email' => 'admin@admin',
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(60),
            ]);
    }
}
