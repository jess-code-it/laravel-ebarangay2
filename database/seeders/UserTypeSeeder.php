<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'name' => 'admin',
                'description' => 'Manages the barangay system and user accounts.',
            ],
            [
                'name' => 'staff',
                'description' => 'Processes barangay services and resident requests.',
            ],
            [
                'name' => 'resident',
                'description' => 'Accesses resident services and submits requests.',
            ],
        ];

        foreach ($roles as $role) {
            DB::table('user_types')->updateOrInsert(
                ['name' => $role['name']],
                [
                    'description' => $role['description'],
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }
    }
}