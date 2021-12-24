<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatAutomaticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chat_automatics')->insert([
            'chat' => 'Mohon maaf, konselor sedang tidak aktif. Chat anda akan dibalas secepatnya ketika konselor aktif',
        ]);
        DB::table('chat_automatics')->insert([
            'chat' => 'Yang sabar yaa, konselor sedang tidak aktif. Chat anda akan dibalas secepatnya ketika konselor aktif',
        ]);
    }
}
