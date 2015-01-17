<?php 

class ItemsTableSeeder extends Seeder{
	public function run()
	{
		DB::table('items')->delete();

		$items = array(
			);
		DB::table('items')->insert($items);
	}
}