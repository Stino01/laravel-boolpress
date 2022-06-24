<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++) {
            $newArticle = new Article();

            $newArticle->title = $faker->words(4, true);
            $newArticle->slug = Str::of($newArticle->title)->slug('-');
            $newArticle->author = $faker->name($gender = null);
            $newArticle->content = $faker->text();
            $newArticle->published = rand(0, 1);

	        $newArticle->save();
        }
    }
}
