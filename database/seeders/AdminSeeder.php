<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'first_name' => 'System',
            'last_name' => 'Administrator',
            'email' => 'admin@expiry.com',
            'password' => Hash::make('Admin123!'),
            'role_id' => 1,
            'business_name' => null,
        ]);  
    }
}
