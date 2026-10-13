<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $accounts = [
            [
                'name' => 'System Administrator',
                'email' => 'admin@ebarangay.test',
                'role' => 'admin',
            ],
            [
                'name' => 'Barangay Staff',
                'email' => 'staff@ebarangay.test',
                'role' => 'staff',
            ],
            [
                'name' => 'Sample Resident',
                'email' => 'resident@ebarangay.test',
                'role' => 'resident',
            ],
        ];

        foreach ($accounts as $account) {
            $userType = UserType::where('name', $account['role'])
                ->firstOrFail();

            $user = User::firstOrNew([
                'email' => $account['email'],
            ]);

            $user->name = $account['name'];
            $user->password = Hash::make('eBarangay123!');
            $user->userType()->associate($userType);
            $user->save();
        }
    }
}