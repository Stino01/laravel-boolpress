<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_list = ['Cronaca', 'Recensione', 'Specialistica', 'Culturale', 'Opinione', 'Intervista'];
        foreach ($category_list as $category) {
            $newCategory = new Category();

            $newCategory->name = $category;
            $newCategory->slug = Str::of($newCategory->name)->slug('-');

            $newCategory->save();
        }
    }
}
