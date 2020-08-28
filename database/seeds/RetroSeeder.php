<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class RetroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        //Insert a retro associated with primary user
        DB::table('retros')->insert([
            'owner_id' => 1,
            'title' => $faker->words(5, true),
            'description' => $faker->paragraph(3, true),
            'status' => 'publish',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        factory(App\Retro::class, 50)->create();
    }
}
