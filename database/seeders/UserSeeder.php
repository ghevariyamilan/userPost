<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        User::create([
            'first_name' => 'Milan',
            'last_name' => 'Ghevariya',
            'email' => 'milan@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(123456789),
            'contact' => '9876543210',
            'remember_token' => Str::random(10),
            'is_admin' => 1
        ]);
    }
}
