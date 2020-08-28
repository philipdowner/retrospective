<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        //Insert a memorable user
        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => 'testuser@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        //Create 50 random users
        factory(App\User::class, 50)->create();
    }
}
