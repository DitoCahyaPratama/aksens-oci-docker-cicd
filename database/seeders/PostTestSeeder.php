<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_tests')->insert(
            [
                [
                    'soal' => 'Saya merasa cemas dengan apa yang akan terjadi dimasa depan',
                    'aspek' => 'Emosi'
                ],
                [
                    'soal' => 'Saya mengalami jantung berdebar, rasa dingin pada telapak tangan/kaki disertai keringat, dan gemetaran',
                    'aspek' => 'Fisik'
                ],
                [
                    'soal' => 'Saya berbohong agar tetap mendapatkan perhatian dari orang disekitar',
                    'aspek' => 'Perilaku'
                ],
                [
                    'soal' => 'Saya merasa menjadi beban bagi orang disekeliling saya',
                    'aspek' => 'Psikologi'
                ],
                [
                    'soal' => 'Saya merasa sulit mengendalikan amarah',
                    'aspek' => 'Emosi'
                ],
                [
                    'soal' => 'Saya merasa kesulitan bernafas',
                    'aspek' => 'Fisik'
                ],
                [
                    'soal' => 'Saya berkelahi dengan orang/pihak yang berbeda pendapat dengan saya',
                    'aspek' => 'Perilaku'
                ],
                [
                    'soal' => 'Saya mengkhawatirkan permasalahan yang dialami oleh orang lain',
                    'aspek' => 'Psikologi'
                ],
                [
                    'soal' => 'Saya menyerah ketika gagal dalam melakukan sesuatu',
                    'aspek' => 'Emosi'
                ],
                [
                    'soal' => 'Saya merasa lelah dengan banyaknya tugas yang diberikan oleh guru',
                    'aspek' => 'Fisik'
                ],
                [
                    'soal' => 'Saya melanggar aturan yang ada disekolah, dirumah maupun yang ada dilingkungan',
                    'aspek' => 'Perilaku'
                ],
                [
                    'soal' => 'Saya tidak dapat memutuskan jalan keluar yang terbaik dalam memecahkan suatu masalah',
                    'aspek' => 'Psikologi'
                ],
                [
                    'soal' => 'Saya takut untuk mencoba hal-hal baru',
                    'aspek' => 'Emosi'
                ],
                [
                    'soal' => 'Saya mengalami kesulitan dalam mengatur pola makan',
                    'aspek' => 'Fisik'
                ],
                [
                    'soal' => 'Saya menyesuaikan pendapat agar teman teman tidak memusuhi saya',
                    'aspek' => 'Perilaku'
                ],
                [
                    'soal' => 'Saya merasa rendah diri karena merasa kurang pandai dibandingkan dengan orang lain disekitar saya',
                    'aspek' => 'Psikologi'
                ],
                [
                    'soal' => 'Saya acuh tehadap respon orang lain tentang perilaku yang telah saya lakukan.',
                    'aspek' => 'Emosi'
                ],
                [
                    'soal' => 'Saya mengalami kesulitan dalam mengatur pola tidur',
                    'aspek' => 'Fisik'
                ],
                [
                    'soal' => 'Saya berbicara tanpa memikirkan perasaan lawan bicara',
                    'aspek' => 'Perilaku'
                ],
                [
                    'soal' => 'Saya mudah putus asa ketika mengahadi sebuah hambatan',
                    'aspek' => 'Psikologi'
                ],
                [
                    'soal' => 'Saya sulit memfokuskan pikiran ketika sedang mempunyai masalah',
                    'aspek' => 'Emosi'
                ],
                [
                    'soal' => 'Saya bisa tidur dengan nyenyak',
                    'aspek' => 'Fisik'
                ],
                [
                    'soal' => 'Saya tidak peduli dengan permasalahan orang lain selama masalah itu tidak melibatkan saya',
                    'aspek' => 'Perilaku'
                ],
                [
                    'soal' => 'Saya merasa hidup saya membosankan',
                    'aspek' => 'Psikologi'
                ],
                [
                    'soal' => 'Saya merasa bahwa kekurangan yang saya miliki adalah hambatan yang berarti',
                    'aspek' => 'Emosi'
                ],
                [
                    'soal' => 'Saya mengalami nyeri otot',
                    'aspek' => 'Fisik'
                ],
                [
                    'soal' => 'Saya merasa tidak mampu melakukan hal-hal yang bermanfaat dalam hidup',
                    'aspek' => 'Perilaku'
                ],
                [
                    'soal' => 'Saya memendam sendiri permasalahan yang saya alami',
                    'aspek' => 'Psikologi'
                ],
                [
                    'soal' => 'Saya tidak bisa membuat keputusan sendiri tanpa bantuan orang lain',
                    'aspek' => 'Perilaku'
                ],
                [
                    'soal' => 'Saya merasa tidak yakin dengan kemampuan dan potensi yang saya miliki',
                    'aspek' => 'Psikologi'
                ],
            ]
        );
    }
}
