<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages=['Hakkımızda','Kariyer','Vizyonumuz','misyonumuz','iletisim'];
        $count=0;
        foreach($pages as $page)
        {
          $count++;
          DB::table('pages')->insert([

            'title'=>$page,
            'slug'=>str_slug($page),
            'image'=>'https://africatodaynewsonline.com/wp-content/uploads/2020/01/https___blogs-images.forbes.com_alejandrocremades_files_2018_07_desk-3139127_1920-1200x773-1.jpg',
            'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'created_at'=>now(),
            'updated_at'=>now(),
             'order'=>$count
          ]);
        }
    }
}
