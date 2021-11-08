<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     DB::table('categories')->insert([
        [
            'name' => 'Смартфоны',
            'user_id' => rand(1,4),
        ],
        [
            'name' => 'Планшеты',
            'user_id' => rand(1,4),
        ],
        [
            'name' => 'Телевизоры',
            'user_id' => rand(1,4),
        ],
        [
            'name' => 'Бытовая Техника',
            'user_id' => rand(1,4),
        ],
    ]);
 }
}
