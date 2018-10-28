<?php

namespace Tjventurini\Tags\Database\Seeds;

use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// use ArticleFactory to create 50 random articles
    	factory(\Tjventurini\Tags\App\Models\Tag::class, 50)->create();
    }
}
