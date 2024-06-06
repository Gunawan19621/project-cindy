<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'name' => 'Customer1',
                'email' => 'john.doe@example.com',
                'phone' => '1234567890',
                'address' => '123 Main Street, Anytown, USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Customer2',
                'email' => 'jane.smith@example.com',
                'phone' => '0987654321',
                'address' => '456 Elm Street, Othertown, USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Customer3',
                'email' => 'alice.johnson@example.com',
                'phone' => '1122334455',
                'address' => '789 Maple Avenue, Sometown, USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
