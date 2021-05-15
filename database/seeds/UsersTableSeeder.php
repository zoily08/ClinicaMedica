<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\User;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	 factory(ClinicaMedica\User::class, 10)->create();

    	

    	 Role::create([

        	'name' =>'Admin',
        	'slug' =>'admin',
        	'special' =>'all-access'



        	]);
        
    }
}
