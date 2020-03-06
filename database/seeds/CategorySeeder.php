<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categories=['Genel','Eglence','Bilişim','Gezi','Günlük Yaşam'];
      foreach ($categories as $category) {

        DB::table('categories')->insert([

          'name'=>$category,
          'slug'=>str_slug($category)

        ]);

      }



    }
}
