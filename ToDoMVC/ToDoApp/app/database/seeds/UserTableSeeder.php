<?php 

class UserTableSeeder extends Seeder{
	public function run()
	{
		DB::table('users')->delete();

		$users = array(
			array(
				'email' => 'Exapme@example.com',
				'password' => Hash::make('miauw')
				)
			);
		DB::table('users')->insert($users);
	}
}