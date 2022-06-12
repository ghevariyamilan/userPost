<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $category = [
            'Laravel', 'Code Igniter', 'PHP', 'HTML', 'CSS', 'jQuery', 'MERN', 'MEAN', 'vue', 'React', 'Angular','Unity',
            '3D','Web Design'
        ];

        foreach($category as $val){
            Category::create(['title' => $val]);
        }
    }
}
