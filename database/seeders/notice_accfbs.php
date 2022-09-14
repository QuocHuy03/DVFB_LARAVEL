<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class notice_accfbs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notice_accfbs')->insert([
            ['type' => 'clone', 'content' => 'Clone víp', 'price' => '1'],
            ['type' => 'via', 'content' => 'via víp', 'price' => '1'],
            ['type' => 'tds', 'content' => 'tds víp', 'price' => '1'],
        ]);
    }
}
