<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('users')->insert([
            [
                'name'	=>  'システム管理者',
                'email'		=>	'admin@bookrecord.com',
                'password'			=> bcrypt('sayakakenta'),
                'level'         => 99,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
        
        ]);
        factory(App\User::class, 10)->create();
    }
}
