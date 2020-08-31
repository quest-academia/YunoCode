<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->insert([
            'category_name' => 'php',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Ruby',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Java',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Python',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Go',
        ]);
    }
}
