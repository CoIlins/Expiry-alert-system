<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema; 
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // Disable foreign key checks
            Schema::disableForeignKeyConstraints();

            // Clear existing roles
            Role::truncate();

            // Admin
            $admin = new Role();
            $admin->role_name = 'Admin';
            $admin->save();

            // Vendor
            $vendor = new Role();
            $vendor->role_name = 'Vendor';
            $vendor->save();

            // Inventory Clerk
            $inventoryClerk = new Role();
            $inventoryClerk->role_name = 'Inventory Clerk';
            $inventoryClerk->save();

            // Re-enable foreign key checks
            Schema::enableForeignKeyConstraints();
    }
}
