<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Admin', 'description' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Super Admin', 'description' => 'super admin', 'created_at' => now(), 'updated_at' => now()]
        ];

        Role::insert($roles);
    }
}
