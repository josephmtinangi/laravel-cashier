<?php
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // 
        // clear the current tables
        DB::table('users')->delete();
        DB::table('posts')->delete();
        // seed posts
        factory(App\Post::class, 65)->create();

        // create a user we can login with
        User::create([
        	'name' => 'Joseph Mtinangi',
        	'email' => 'josephmtinangi@gmail.com',
        	'password' => bcrypt('password')
        	]);
    }
}
