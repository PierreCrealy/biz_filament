<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\TypeActivities::factory()->create([
            'label' => 'Balade',
        ]);

        \App\Models\TypeActivities::factory()->create([
            'label' => 'Trotting',
        ]);

        \App\Models\TypeActivities::factory()->create([
            'label' => 'Désensibilisation',
        ]);
    }
}
