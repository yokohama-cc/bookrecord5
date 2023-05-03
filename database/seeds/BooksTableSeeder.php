<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('books')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
       
        
        DB::table('books')->insert([
            [
                'name'	=>  '世界から格差がなくならない本当の理由',
                'author'		=>	'池上 彰',
                'company'			=>'SBクリエイティブ',
                'year_publication'		=>	2017,
                'isbn'		=>	'4-7973-8952-4',              
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ]
        ]);
        factory(App\Book::class, 100)->create();
    }
}
