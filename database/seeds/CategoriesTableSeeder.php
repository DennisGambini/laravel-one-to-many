<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    protected $myCategories = [
        'Primi Piatti',
        'Secondi Piatti',
        'Piatti Freddi',
        'Piatti Veloci',
        'Dessert',
        'Antipasti',
        'Estivi',
        'Invernali'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->myCategories as $category){
            $newCat = new Category();

            $newCat->name = $category;
            $newCat->cat_slug = Str::of($newCat->name)->slug('-');

            $newCat->save();
        }
    }
}
