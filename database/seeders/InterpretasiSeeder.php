<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterpretasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interpretasis')->insert([
            'persentase' => '20',
            'description' => 'Anda memiliki kesehatan mental yang masih dianggap normal dan tidak perlu dikhawatirkan. Anda memiliki kemampuan yang sangat baik untuk menyelesaikan masalah yang muncul dan mampu mengendalikan emosi dengan baik. Bahkan, hal ini tidak memengaruhi rutinitas harian. Anda masih bisa makan dengan lahap, tidur nyenyak, dan tetap bisa menjalani aktivitas sehari hari dengan baik. Tetap pertahankan kesehatan mental anda dengan melakukan hal hal positif dan selalu berfikir positif.',
        ]);
        DB::table('interpretasis')->insert([
            'persentase' => '40',
            'description' => 'Tingkat kesehatan mental anda masih tergolong tinggi. Mungkin ada beberapa tekanan yang sedang anda alami. Namun hal itu masih bisa anda tangani dengan baik. Aktivitas keseharian juga masih bisa anda jalani dengan baik. Anda memiliki kepercayaan dan kemampuan untuk menyelesaikan hambatan yang anda alami. Terus tingkatkan kesehatan mental anda dengan melakukan hal hal positif dan selalu berfikir positif.',
        ]);
        DB::table('interpretasis')->insert([
            'persentase' => '60',
            'description' => 'Kondisi kesehatan mental kamu mungkin tidak buruk, tapi juga tidak baik baik saja. Beberapa hambatan nampaknya membuat anda merasa kesulitan untuk menyelesaikannya. Apabila ada yang ingin anda konsultasikan, segera hubungi konselor dan ceritakan apa yang menjadi kesulitan bagi anda. Konselormu akan dengan senang hati membantu.',
        ]);
        DB::table('interpretasis')->insert([
            'persentase' => '80',
            'description' => 'Anda sedag tidak baik baik saja. Beberapa tekanan nampaknya mulai mengganggu aktivitas keseharian anda. Apabila tidak segera ditangani, kesehatan mental anda bisa semakin menurun. Namun, jangan khawatir, konselormu akan dengan senang hati membantu.Segera hubungi konselormu sekarang dan mulai bicarakan gejalamu secara lebih rinci.',
        ]);
        DB::table('interpretasis')->insert([
            'persentase' => '100',
            'description' => 'Anda sedang tidak baik baik saja. Nampaknya anda sedang mengalami banyak tekanan. Akibatnya, aktivitas sehari hari yang anda jalani juga ikut terganggu. Namun, jangan khawatir, konselormu akan dengan senang hati membantu. Semakin cepat stres ditangani, semakin cepat pula pemulihannya. Segera hubungi konselormu sekarang dan mulai bicarakan gejalamu secara lebih rinci. ',
        ]);
    }
}
