<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pre_tests')->insert(
            [
                [
                    'soal' => 'Saya marah ketika sesuatu terjadi diluar rencana',
                    'aspek' => 'Emosi'
                ],
                [
                    'soal' => 'Saya mengalami rasa sakit pada bagian tubuh tertentu seperti kepala, perut, dll.',
                    'aspek' => 'Fisik'
                ],
                [
                    'soal' => 'Saya merasa sulit untuk mengambil keputusan',
                    'aspek' => 'Perilaku'
                ],
                [
                    'soal' => 'Saya mudah merasa takut akan suatu hal',
                    'aspek' => 'Psikologi'
                ],
                [
                    'soal' => 'Perasaan saya mudah berubah ubah (moody)',
                    'aspek' => 'Emosi'
                ],
                [
                    'soal' => 'Saya mengalami penurunan nafsu makan, atau tidak memiliki nafsu makan.',
                    'aspek' => 'Fisik'
                ],
                [
                    'soal' => 'Saya merasa kesulitan untuk menjalani kegiatan atau pekerjaan sehari-hari',
                    'aspek' => 'Perilaku'
                ],
                [
                    'soal' => 'Saya cemas ketika menghadapi sebuah masalah',
                    'aspek' => 'Psikologi'
                ],
                [
                    'soal' => 'Saya mudah tersinggung dengan perkataan orang lain',
                    'aspek' => 'Emosi'
                ],
                [
                    'soal' => 'Dalam seminggu saya mengalami penurunan berat badan lebih dari 3 kg.',
                    'aspek' => 'Fisik'
                ],
                [
                    'soal' => 'Saya meninggalkan kewajiban atau tanggung jawab seperti ibadah, membantu orang tua, mengerjakan tugas, dll',
                    'aspek' => 'Perilaku'
                ],
                [
                    'soal' => 'Saya mudah gelisah belakangan ini',
                    'aspek' => 'Psikologi'
                ],
                [
                    'soal' => 'Saya menangis karena hal hal yang remeh',
                    'aspek' => 'Emosi'
                ],
                [
                    'soal' => 'Dalam seminggu saya mengalami kenaikan berat badan lebih dari 3 kg',
                    'aspek' => 'Fisik'
                ],
                [
                    'soal' => 'Saya mengalami penurunan prestasi dan kehilangan semangat untuk mengerjakan tugas sekolah.',
                    'aspek' => 'Perilaku'
                ],
                [
                    'soal' => 'Saya merasa kehilangan motivasi dalam menjalani hidup',
                    'aspek' => 'Psikologi'
                ],
                [
                    'soal' => 'Ketika marah saya memilih untuk melampiaskannya',
                    'aspek' => 'Emosi'
                ],
                [
                    'soal' => 'Saya mengalami susah tidur (insomnia)',
                    'aspek' => 'Fisik'
                ],
                [
                    'soal' => 'Saya merasa kesulitan untuk berkonsentrasi atau tidak fokus saat mengerjakan sesuatu',
                    'aspek' => 'Perilaku'
                ],
                [
                    'soal' => 'Saya berfikiran negatif terhadap banyak hal',
                    'aspek' => 'Psikologi'
                ],
                [
                    'soal' => 'Saya merasa malu ketika ingin bertanya mengenai hal hal yang tidak saya pahami',
                    'aspek' => 'Emosi'
                ],
                [
                    'soal' => 'Saya mudah merasa lelah/lesu sehingga malas melakukan sesuatu',
                    'aspek' => 'Fisik'
                ],
                [
                    'soal' => 'Saya lebih memilih menghindari masalah daripada menyelesaikannya',
                    'aspek' => 'Perilaku'
                ],
                [
                    'soal' => 'Saya merasa bahwa saya adalah orang yang tidak berguna',
                    'aspek' => 'Psikologi'
                ],
                [
                    'soal' => 'Saya tidak perduli dengan musibah yang dialami orang lain',
                    'aspek' => 'Emosi'
                ],
                [
                    'soal' => 'Saya cemas dengan bentuk fisik yang saya miliki',
                    'aspek' => 'Fisik'
                ],
                [
                    'soal' => 'Saya menghindari atau menarik diri dari lingkungan keluarga, teman, dan lingkungan sekitar',
                    'aspek' => 'Perilaku'
                ],
                [
                    'soal' => 'Saya ingin menyakiti diri sendiri, dan memiliki pemikiran untuk mengakhiri hidup.',
                    'aspek' => 'Psikologi'
                ],
                [
                    'soal' => 'Saya marah ketika orang lain bisa lebih berhasil daripada saya',
                    'aspek' => 'Emosi'
                ],
                [
                    'soal' => 'Saya mengalami gangguan pencernaan, seperti gangguan asam lambung, diare, sembelit, mual, dll.',
                    'aspek' => 'Fisik'
                ],
            ]
        );
    }
}
