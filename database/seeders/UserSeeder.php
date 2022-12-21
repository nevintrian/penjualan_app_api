<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'budi@gmail.com',
            'password' => 'budi123',
            'name' => 'Budi'
        ]);
        
        User::create([
            'email' => 'septian@gmail.com',
            'password' => 'septian123',
            'name' => 'Septian'
        ]);
    }
}
