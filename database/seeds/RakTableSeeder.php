<?php

use Illuminate\Database\Seeder;

class RakTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  DB::table('categories')->insert([
        //     'categories_name' => Str::random(10),
        // ]);
        factory(App\Rak::class, 10)->create();
    }
}
