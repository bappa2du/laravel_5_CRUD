<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Model\Book;
use App\Model\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
	}

}
class UserTableSeeder extends Seeder
{
    public function run()
    {
        Book::create([
            "name"  =>  "The Great Science",
            "topic" =>  "Physics"
        ]);
        User::create([
            "username" => "bappa",
            "password" => Hash::make(1234),
        ]);
    }
}