<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Category;
use Illuminate\Support\Str;
use Faker\Factory;

class CategoriesTableSeeder extends Seeder
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
        factory(App\Category::class, 10)->create();
    }
}
