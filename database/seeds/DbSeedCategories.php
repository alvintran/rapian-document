<?php

use Illuminate\Database\Seeder;

class DbSeedCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('categories')->insert([
			[
				'id'        =>1,
				'name'      =>'Clothing',
				'slug' 		=> 'clothing',
				'parent_id' => 0,
				'path' 		=> '-1-',
				'level'     => 1,
				'active' 	=> 1,
				'type' 		=> 1
			],
			[
				'id'        =>2,
				'name'      =>'Men\'s',
				'slug' 		=> 'men-s',
				'parent_id' => 1,
				'path' 		=> '-1--2-',
				'level'     => 2,
				'active' 	=> 1,
				'type' 		=> 1
			],
			[
				'id'        =>3,
				'name'      =>'Women\'s',
				'slug' 		=> 'women-s',
				'parent_id' => 1,
				'path' 		=> '-1--3-',
				'level'     => 2,
				'active' 	=> 1,
				'type' 		=> 1
			],
			[
				'id'        => 4,
				'name'      => 'Suits',
				'slug' 		=> 'suits',
				'parent_id' => 2,
				'path' 		=> '-1--2--4-',
				'level'     => 3,
				'active' 	=> 1,
				'type' 		=> 1
			],
			[
				'id'        => 5,
				'name'      => 'Slacks',
				'slug' 		=> 'slacks',
				'parent_id' => 4,
				'path' 		=> '-1--2--4--5-',
				'level'     => 4,
				'active' 	=> 1,
				'type' 		=> 1
			],
			[
				'id'        => 6,
				'name'      => 'Jackets',
				'slug' 		=> 'jackets',
				'parent_id' => 4,
				'path' 		=> '-1--2--4--6-',
				'level'     => 4,
				'active' 	=> 1,
				'type' 		=> 1
			],
			[
				'id'        => 7,
				'name'      => 'Dresses',
				'slug'      => 'dresses',
				'parent_id' => 3,
				'path' 		=> '-1--3--7-',
				'level'     => 3,
				'active' 	=> 1,
				'type' 		=> 1
			],
			[
				'id'        => 8,
				'name'      => 'Skirts',
				'slug'      => 'skirts',
				'parent_id' =>3,
				'path' 		=> '-1--3--8-',
				'level'     => 3,
				'active' 	=> 1,
				'type' 		=> 1
			],
			[
				'id'        =>9,
				'name'      =>'Blouses',
				'slug'      =>'blouses',
				'parent_id' =>3,
				'path' 		=> '-1--3--9-',
				'level'     => 3,
				'active' 	=> 1,
				'type' 		=> 1
			],
			[
				'id'        =>10,
				'name'      =>'Evening Gorws',
				'slug'      =>'evening-gorws',
				'parent_id' =>7,
				'path' 		=> '-1--3--7--10-',
				'level'     => 4,
				'active' 	=> 1,
				'type' 		=> 1
			],
			[
				'id'        =>11,
				'name'      =>'Sun Dresses',
				'slug'      =>'sun-dresses',
				'parent_id' =>7,
				'path' 		=> '-1--3--7--11-',
				'level'     => 4,
				'active' 	=> 1,
				'type' 		=> 1
			]
		]);
    }
}
