<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find the roles (since they are already created in RolePermissionSeeder)
        $creatorRole = Role::where('name', 'creator')->first();

        // Insert the users
        $user1 = DB::table('users')->insertGetId([
            'name' => 'Islombek Baxromov',
            'email' => 'alicoder@creator.com',
            'password' => Hash::make('alicoder@creator.com'),
        ]);


        // Assign roles to users
        DB::table('model_has_roles')->insert([
            ['role_id' => $creatorRole->id, 'model_type' => 'App\\Models\\User', 'model_id' => $user1],
        ]);
    }
}
