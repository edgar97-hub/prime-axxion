<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'edgar', 
        	'email' => 'edgajquispe@gmail.com',
        	'password' => bcrypt('12345678')
        ]);
  
        $Admin = Role::create(['name' => 'Admin']);
        $User = Role::create(['name' => 'User']);
   
        $permissions = Permission::pluck('id','id')->all();
  
        $Admin->syncPermissions($permissions);
   
        $user->assignRole([$Admin->id]);
    }
}
