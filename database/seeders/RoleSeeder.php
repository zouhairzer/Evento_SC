<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = [
            ['role'=> 'admin'],
            ['role'=> 'organisatuer'],
            ['role'=> 'user'],
        ];

        foreach($role as $rolesData){
            Role::create($rolesData);
        }
    }
}
