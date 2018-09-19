<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Electronics',
            'Kitchen Ware',
            'Cabeling'
        ];
        
        foreach ($categories as $category ) {
            Category::create([
                'name' => $category
            ]);
        }

        $this->command->info('Categories Fake Data Created !');
    }
}
