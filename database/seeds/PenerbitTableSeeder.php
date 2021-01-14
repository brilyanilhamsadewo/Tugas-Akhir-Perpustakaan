<?php

use Illuminate\Database\Seeder;

class PenerbitTableSeeder extends Seeder
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
        factory(App\Penerbit::class, 10)->create();
    }
}
