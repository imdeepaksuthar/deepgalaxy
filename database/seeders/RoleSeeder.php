<?php

namespace Database\Seeders;

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
        $createMultipleRoles = [
            ['name'=>'User', 'created_at'=> now(),'updated_at'=> now()],
            ['name'=>'Admin', 'created_at'=> now(),'updated_at'=> now()]
        ];
        
        Role::insert($createMultipleRoles); // Eloquent
    }
}
