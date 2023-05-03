<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReadingRecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reading_records')->truncate();
        DB::table('reading_records')->insert([
            [
                'book_id'	=>  1,
                'reader_id'		=>	1,
                'year_read'		=> 2018,
                'month_read'    => 02,
                'report'		=>'私達の１円でも安いものを買うという行動が格差を広げてしまうということを知り心が痛んだ。',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ]
        ]);
        factory(App\ReadingRecord::class, 500)->create();
    }
}
