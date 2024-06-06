<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            AdminSeeder::class,
            StatusesSeeder::class,
            CustomerSeeder::class,
            ArmadasSeeder::class,
        ]);

        $filePath = database_path('seeders/indonesia.sql');
        $sql = file_get_contents($filePath);
        $queries = explode(';', $sql);

        foreach ($queries as $query) {
            if (trim($query) != '') {
                DB::unprepared($query);
            }
        }
    }
}
