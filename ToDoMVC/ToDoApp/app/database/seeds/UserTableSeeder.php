<?php 

class UserTableSeeder extends Seeder{
	public function run()
	{
		DB::table('users')->delete();

		$users = array(
			array(
				'email' => 'admin@admin.com',
				'password' => Hash::make('superadmin')
				)
			);
		DB::table('users')->insert($users);
	}
}