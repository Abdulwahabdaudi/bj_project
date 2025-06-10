<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            [ 'email' => 'admin@example.com' ],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin1234'), // Change this password after first login
                'is_admin' => true,
            ]
        );
    }
} 