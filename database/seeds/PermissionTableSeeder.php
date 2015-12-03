<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
   {
    	DB::table('permissions')->insert([
    		[
				'name' => 'user.view',
				'display_name' => 'View',
				'description' => "View user's info"
    		],
    		[
				'name' => 'user.create',
				'display_name' => 'Create',
				'description' => "Create an user"
			],
			[
				'name' => 'user.edit',
				'display_name' => 'Edit',
				'description' => "Edit user's info"
			],
			[
				'name' => 'user.delete',
				'display_name' => 'Delete',
				'description' => 'Delete an user'
			]
		]);
   }
}
