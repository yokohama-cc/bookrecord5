<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReadersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('readers')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
/*        DB::table('readers')->insert([
            [
                'name'	=>  'shu',
                'school_number'		=>	'1234567',
                'class'			=>'A',
                'user_id'		=>'1',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ]
        ]);*/
        $users = User::all();
        foreach ($users as $user) {
            
        
        factory(App\Reader::class)->create([
            'user_id' => $user->id,
            'name' => $user->name,
        ]);}
    }
}
