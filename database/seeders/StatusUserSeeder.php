<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\StatusUser::factory()->create([
            'label' => 'En attente',
        ]);

        \App\Models\StatusUser::factory()->create([
            'label' => 'Accepter',
        ]);

        \App\Models\StatusUser::factory()->create([
            'label' => 'Refuser',
        ]);
    }
}
