<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags_list = ['online', 'cartaceo', 'giornaliero', 'mensile'];
        foreach ($tags_list as $tag) {
            $newTag = new Tag();

            $newTag->name = $tag;
            $newTag->slug = Str::of($newTag->name)->slug('-');

            $newTag->save();
        }
    }
}
