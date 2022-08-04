<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
       $role1= Role::create(['name' =>' super_admin']);
       $role2=  Role::create(['name' => 'hotel_admin']);
       $role3=  Role::create(['name' => 'rest_admin']);
       $role4=  Role::create(['name' => 'app_admin']);
       $role5=  Role::create(['name' => 'escort_admin']);
       $role6=  Role::create(['name' => 'user']);
       $role7=  Role::create(['name' => 'trip_admin']);

       Permission::create(['name' =>'update_hotel']);
       Permission::create(['name' =>'store_hotel']);
       Permission::create(['name' =>'show_hotel']);
       Permission::create(['name' =>'delet_hotel']);

       Permission::create(['name' =>'delet_resturant']);
       Permission::create(['name' =>'update_resturant']);
       Permission::create(['name' =>'store_resturant']);
       Permission::create(['name' =>'show_resturant']);


       Permission::create(['name' =>'update_tour']);
       Permission::create(['name' =>'store_tour']);
       Permission::create(['name' =>'show_tour']);
       Permission::create(['name' =>'delet_tour']);

       Permission::create(['name' =>'update_trip']);
       Permission::create(['name' =>'store_trip']);
       Permission::create(['name' =>'show_trip']);
       Permission::create(['name' =>'delet_trip']);

       Permission::create(['name' =>'update_escort']);
       Permission::create(['name' =>'store_escort']);
       Permission::create(['name' =>'show_escort']);
       Permission::create(['name' =>'delet_escort']);

      

       Permission::create(['name' =>'update_user']);
       Permission::create(['name' =>'store_user']);
       Permission::create(['name' =>'show_user']);
       Permission::create(['name' =>'delet_user']);

       Permission::create(['name' =>'update_taxi']);
       Permission::create(['name' =>'store_taxi']);
       Permission::create(['name' =>'show_taxi']);
       Permission::create(['name' =>'delet_taxi']);

       Permission::create(['name' =>'book_hotel']);
       Permission::create(['name' =>'book_resturant']);
       Permission::create(['name' =>'book_escort']);
       Permission::create(['name' =>'book_trip']);
      

    $role1->givePermissionTo('delet_hotel');
       $role1->givePermissionTo('update_hotel');
       $role1->givePermissionTo('show_hotel');
       $role1->givePermissionTo('store_hotel');
       $role1->givePermissionTo('book_hotel');
       $role1->givePermissionTo('delet_resturant');
       $role1->givePermissionTo('update_resturant');
       $role1->givePermissionTo('show_resturant');
       $role1->givePermissionTo('store_resturant');
       $role1->givePermissionTo('book_resturant');
       $role1->givePermissionTo('delet_escort');
       $role1->givePermissionTo('update_escort');
       $role1->givePermissionTo('show_escort');
       $role1->givePermissionTo('store_escort');
       $role1->givePermissionTo('book_escort');
       $role1->givePermissionTo('delet_trip');
       $role1->givePermissionTo('update_trip');
       $role1->givePermissionTo('show_trip');
       $role1->givePermissionTo('store_trip');
       $role1->givePermissionTo('book_trip');
       $role1->givePermissionTo('delet_user');
       $role1->givePermissionTo('update_user');
       $role1->givePermissionTo('show_user');
       $role1->givePermissionTo('store_user');
       $role1->givePermissionTo('delet_taxi');
       $role1->givePermissionTo('update_taxi');
       $role1->givePermissionTo('show_taxi');
       $role1->givePermissionTo('store_taxi'); 
       $role1->givePermissionTo('delet_tour');
       $role1->givePermissionTo('update_tour');
       $role1->givePermissionTo('show_tour');
       $role1->givePermissionTo('store_tour');
    

      
       $role2->givePermissionTo('delet_hotel');
       $role2->givePermissionTo('update_hotel');
       $role2->givePermissionTo('show_hotel');
       $role2->givePermissionTo('store_hotel');
       $role2->givePermissionTo('book_hotel');

       $role3->givePermissionTo('delet_resturant');
       $role3->givePermissionTo('update_resturant');
       $role3->givePermissionTo('show_resturant');
       $role3->givePermissionTo('store_resturant');
       $role3->givePermissionTo('book_resturant');
       
       $role4->givePermissionTo('delet_taxi');
       $role4->givePermissionTo('update_taxi');
       $role4->givePermissionTo('show_taxi');
       $role4->givePermissionTo('store_taxi'); 
       $role4->givePermissionTo('delet_tour');
       $role4->givePermissionTo('update_tour');
       $role4->givePermissionTo('show_tour');
       $role4->givePermissionTo('store_tour');
   

       $role5->givePermissionTo('delet_escort');
       $role5->givePermissionTo('update_escort');
       $role5->givePermissionTo('show_escort');
       $role5->givePermissionTo('store_escort');
       $role5->givePermissionTo('book_escort');

       
       $role7->givePermissionTo('delet_trip');
       $role7->givePermissionTo('update_trip');
       $role7->givePermissionTo('show_trip');
       $role7->givePermissionTo('store_trip');
       $role7->givePermissionTo('book_trip');
       
       $role6->givePermissionTo('delet_user');
   $role6->givePermissionTo('update_user');
       $role6->givePermissionTo('show_user');
     $role6->givePermissionTo('store_user');
       $role6->givePermissionTo('show_trip');
      $role6->givePermissionTo('book_trip');
    $role6->givePermissionTo('show_escort');
       $role6->givePermissionTo('book_escort');
       $role6->givePermissionTo('show_tour');
       $role6->givePermissionTo('show_taxi');
      $role6->givePermissionTo('show_hotel');
       $role6->givePermissionTo('book_hotel');
       $role6->givePermissionTo('show_resturant');
       $role6->givePermissionTo('book_resturant');
      
 









      /*  */
/*$permissions = [
'delet_hotel','update_hotel','store_hotel','show_hotel',
'delet_rest','update_rest','store_rest','show_rest',
'delet_tour','update_tour','store_tour','show_tour',
'delet_escort','update_escort','store_escort','show_escort',
'delet_user','update_user','store_user','show_user',
'delet_taxi','update_taxi','store_taxi','show_taxi', 
'book_rest','book_hotel','book_escort',       
    
    ];
    
    
    
    foreach ($permissions as $permission) {
    
    Permission::create(['name' => $permission]);
    }
    
    $role1->givePermissionTo('delet_hotel','update_hotel','store_hotel','show_hotel',
    'delet_rest','update_rest','store_rest','show_rest',
    'delet_tour','update_tour','store_tour','show_tour',
    'delet_escort','update_escort','store_escort','show_escort',
    'delet_user','update_user','store_user','show_user',
    'delet_taxi','update_taxi','store_taxi','show_taxi', 
    'book_rest','book_hotel','book_escort');
    $role2->givePermissionTo(
        'delet_hotel','update_hotel','store_hotel','show_hotel','book_hotel');
    $role3->givePermissionTo('delet_rest','update_rest','store_rest','show_rest','book_rest');
    $role4->givePermissionTo('delet_hotel','update_hotel','store_hotel','show_hotel',
    'delet_rest','update_rest','store_rest','show_rest',
    'delet_tour','update_tour','store_tour','show_tour',
    'delet_escort','update_escort','store_escort','show_escort',
    
    'delet_taxi','update_taxi','store_taxi','show_taxi', 
          );
    $role5->givePermissionTo( 'delet_escort','update_escort','store_escort','show_escort','book_escort');
    $role6->givePermissionTo('delet_user','update_user','store_user','show_user',);


*/



    }
}
