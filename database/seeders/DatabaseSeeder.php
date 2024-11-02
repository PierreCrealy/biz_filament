<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            SettingSeeder::class,
            RoleUserSeeder::class,
            StatusUserSeeder::class,
            TypeUserSeeder::class,
            UserSeeder::class,

            AnnouncementSeeder::class,
            MedicalSeeder::class,
            WorkSeeder::class,
            HorseSeeder::class,

            LevelActivitiesSeeder::class,
            TypeActivitiesSeeder::class,
            ActivitiesSeeder::class,

            ActivitiesRegistrationsSeeder::class,
            MedicalRegistrationsSeeder::class,
            WorkRegistrationsSeeder::class,
            AvailabilitySeeder::class,

        ]);
    }
}
