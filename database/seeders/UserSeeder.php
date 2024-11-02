<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'lastname' => 'Bournazel',
            'name'     => 'Pierre',
            'date_birth' => '2002-09-13',
            'email' => 'pierrebournazel@gmail.com',
            'tel' => '0613242685',

            'status_id' => 2,
            'role_id' => 2,
            'type_id' => 1,
        ]);

        \App\Models\User::factory()->create([
            'lastname' => 'Lambda',
            'name'     => 'User',
            'date_birth' => '2002-09-13',
            'email' => 'lambdauser@gmail.com',
            'tel' => '',

            'status_id' => 2,
            'role_id' => 1,
            'type_id' => 1,
        ]);
    }
}
