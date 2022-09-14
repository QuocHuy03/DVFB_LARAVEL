<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class site_configs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_configs')->insert([
            ['name' => 'domain', 'value' => 'Lê Quốc Huy'],
            ['name' => 'logoWeb', 'https://i.imgur.com/dYNUAAT.png'],
            ['name' => 'favicon', 'value' => 'https://i.imgur.com/dYNUAAT.png'],
            ['name' => 'transfer_code', 'lqh'],
            ['name' => 'card_type', 'value' => 'thesieure'],
            ['name' => 'parther_id', 'value' => 'LQH'],
            ['name' => 'parther_key', 'value' => 'LQH'],
            ['name' => 'thongbao', 'value' => 'Lê Quốc Huy'],
            ['name' => 'token_facebook', 'value' => 'null'],
            ['name' => 'api_tele', 'value' => '1'],
            ['name' => 'id_chat_tele', 'value' => '1'],
            ['name' => 'charge_level_TV', 'value' => '10'],
            ['name' => 'charge_level_CTV', 'value' => '20'],
            ['name' => 'charge_level_DL', 'value' => '30'],
            ['name' => 'charge_level_NPP', 'value' => '100'],
            ['name' => 'discount_TV', 'value' => '1'],
            ['name' => 'discount_CTV', 'value' => '1'],
            ['name' => 'discount_DL', 'value' => '1'],
            ['name' => 'discount_NPP', 'value' => '1'],
            ['name' => 'card_discount', 'value' => '1'],
            ['name' => 'admin_name', 'value' => 'Lê Quốc Huy'],
            ['name' => 'facebook_admin', 'value' => 'null'],
            ['name' => 'zalo_admin', 'value' => 'null'],
            ['name' => 'subgiare', 'value' => 'show'],
            ['name' => 'baostar', 'value' => 'hide'],
            ['name' => 'logo', 'value' => 'logo'],
            ['name' => 'token_subgiare', 'value' => 'null'],
            ['name' => 'token_baostar', 'value' => 'null'],
        ]);
    }
}
