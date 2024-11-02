<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\RoleUser::factory()->create([
            'label' => 'Lambda',
        ]);

        \App\Models\RoleUser::factory()->create([
            'label' => 'Super-Lambda',
        ]);

        \App\Models\RoleUser::factory()->create([
            'label' => 'Vétérinaire',
        ]);
    }
}
