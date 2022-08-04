<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\User;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* $role = Role::findByName('hotel_admin');
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'jgyyjnnio',
            'phone' =>'099989',
            
        ]);
        
        $role->givePermissionTo('show_taxi');
$user->assignRole($role);*/











    }
}
