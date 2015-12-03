<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('roles')->insert([
			[
				'name' => 'superadmin',
				'display_name' => 'Super Admin',
				'description' => 'Super administrator role'
			],
			[
				'name' => 'admin',
				'display_name' => 'Administrator',
				'description' => 'Administrator role'
			],
			[
				'name' => 'editor',
				'display_name' => 'Editor',
				'description' => 'Editor role'
			]
		]);
    }
}
