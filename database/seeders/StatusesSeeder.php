<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            [
                'nama' => 'done',
                'description' => 'The order has been completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'pending',
                'description' => 'The order is still pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'canceled',
                'description' => 'The order has been canceled',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}