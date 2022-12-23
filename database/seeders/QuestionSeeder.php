<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions =
            [
                [
                    'priority' => 1,
                    'body' => '	Hasil dari 20×(40:8)-(16+9) = …',
                    'answers' => json_encode([60, 75, 100, 125]),
                    'correct' => 1,
                    'foto' => '',
                ],
                [
                    'priority' => 2,
                    'body' => '	Ari mempunyai 2 lembar uang seribuan dan 6 koin seratusan dan Santi mempunyai 3 lembar uang seribuan dan 7 koin seratusan. Jumlah uang Ari dan Santi adalah...',
                    'answers' => json_encode(['Rp. 6.300', 'Rp. 7.300', 'Rp. 7.700', 'Rp. 8.300']),
                    'foto' => '',
                    'correct' => 0
                ],
                [
                    'priority' => 3,
                    'body' => '	Ahmad memiliki kelereng yang disimpan di 4 toples miliknya, setiap toples berisi 75 kelereng. Ahmad mengambil 15 kelereng dari masing-masing toples untuk diberikan kepada teman-temannya. Sisa kelereng yang dimiliki Ahmad adalah ….',
                    'answers' => json_encode([60, 240, 285, 300]),
                    'foto' => '',
                    'correct' => 1
                ],
                [
                    'priority' => 4,
                    'body' => '	Data pengunjung perpustakaan sekolah pada bulan November 2022 disajikan dalam diagram batang di atas, berdasarkan diagram batang di atas, selisih pengunjung pada minggu kedua dan minggu kelima adalah …. Orang',
                    'answers' => json_encode([20, 30, 40, 50]),
                    'correct' => 0,
                    'foto' => '4.png'
                ],
                [
                    'priority' => 5,
                    'body' => '	Keliling dari bangun datar di atas adalah... . cm',
                    'answers' => json_encode([40, 80, 192, 384]),
                    'correct' => 1,
                    'foto' => '5.png'
                ],
                [
                    'priority' => 6,
                    'body' => '	Kalimat yang tepat untuk melengkapi percakapan rumpang tersebut adalah ….',
                    'answers' => json_encode([
                        'Kapan kak Rio bisa bermain bola professional?',
                        'Berapa umur kak Rio sekarang?',
                        'Kalau boleh saya tahu, sejak kapan kak Rio mulai berlatih bermain bola?',
                        'Oh ya, kapan ulang tahun kak Rio ya?'
                    ]),
                    'correct' => 2,
                    'foto' => '6.png'
                ],
                [
                    'priority' => 7,
                    'body' => '	Kalimat yang tepat untuk melengkapi isi pantun di atas adalah ….',
                    'answers' => json_encode(['Jika kita naik kela satu,
                Akan dipuji orang tuanya
                ', 'Setiap hari membuat jamu,
                Diminum hilang rasa sakitnya
                ', 'Rajin-rajinlah menuntut ilmu,
                Untuk bekal di hari tua
                ', 'Orang baik adalah aku,
                Berkata baik dan wajah ceria
                ']),
                    'correct' => 2,
                    'foto' => '7.png'
                ],
                [
                    'priority' => 8,
                    'body' => '	Isi cuplikan laporan di atas adalah ….',
                    'answers' => json_encode(['Gangguan jalan akibat hujan dan angin kencang', 'Perjalanan warga ke kota lebih jauh', 'Keterlambatan orang-orang sampai ke temat tujuan', 'Gangguan jalan akibat pohon yang tumbang']),
                    'correct' => 3,
                    'foto' => '8.png'
                ],
                [
                    'priority' => 9,
                    'body' => '	Sejak kelas I sampai kelas VI SD, Anisa selalu menjadi … . Dia tak pernah absen untuk menerima hadiah prestasi yang diberikan kepala sekolah. Ungkapan yang tepat untuk melengkapi kalimat tersebut adalah… ',
                    'answers' => json_encode(['Buah bibir', 'Besar kepala', 'Bintang kelas', 'Kabar burung']),
                    'foto' => '',
                    'correct' => 2
                ],
                [
                    'priority' => 10,
                    'body' => 'Pertandingan sepakbola antara PSS dan Persebaya berakhir dengan kemenangan oleh Persebaya. Suasana permainan sangat hidup. Para pendukung telah membanjiri Stadion Maguwoharjo sebelum pertandingan dimulai. Mereka saling menjaga satu sama lain, sehingga tidak ada banyak keributan sampai pertandingan selesai. Arti kata pendukung dalam paragraf adalah… .',
                    'answers' => json_encode(['Reporter', 'Proyektor', 'Provokator', 'Supporter']),
                    'foto' => '', 'correct' => 3

                ],
                [
                    'priority' => 11,
                    'body' => '	One, Two, ... , Four, Five.',
                    'answers' => json_encode(['Try', 'Tree', 'Three', 'There']),
                    'foto' => '',
                    'correct' => 2
                ],
                [
                    'priority' => 12,
                    'body' => '	',
                    'answers' => json_encode(['Good bye', 'Good night', 'Good morning', "I'm fine thank you"]),
                    'correct' => 3,
                    'foto' => '12.png'
                ],
                [
                    'priority' => 13,
                    'body' => '“Good morning” in Indonesia means... .',
                    'answers' => json_encode(['Selamat pagi', 'Selamat sore', 'Selamat malam', 'Selamat jumpa']),
                    'foto' => '',
                    'correct' => 0
                ],
                [
                    'priority' => 14,
                    'body' => '	It is ...',
                    'answers' => json_encode(['Five past eight', 'One past eight', 'Five to eight', 'One to eight']),
                    'correct' => 0,
                    'foto' => '14.png'
                ],
                [
                    'priority' => 15,
                    'body' => '	The colour of apple is...',
                    'answers' => json_encode([60, 75, 100, 125]),
                    'correct' => 2,
                    'foto' => '15.jpg'
                ],
                [
                    'priority' => 16,
                    'body' => '	Simbiosis mutualisme ditunjukkan oleh… ',
                    'answers' => json_encode(['Tali putri dengan teh-tehan', 'Gulma dengan tanaman padi', 'Anggrek dengan pohon besar', 'Kerbau dengan burung jalak']),
                    'foto' => '',
                    'correct' => 3
                ],
                [
                    'priority' => 17,
                    'body' => '	Doni menaruh kapur barus di dalam lemari untuk mengusir kecoa, setelah beberapa hari kapur barus hilang. Hal ini dikarenakan kapur barus... .',
                    'answers' => json_encode(['Mencair', 'Menguap', 'Menyublim', 'Dimakan kecoa']),
                    'foto' => '',
                    'correct' => 2
                ],
                [
                    'priority' => 18,
                    'body' => '	Urutan tahap perkembangan hewan di atas dalam daur hidupnya adalah...',
                    'answers' => json_encode(['A-B-C-D', 'C-D-B-A', 'B-D-A-B', 'D-B-C-A']),
                    'correct' => 1,
                    'foto' => '18.png'
                ],
                [
                    'priority' => 19,
                    'body' => '	Alat yang mempunyai bentuk perubahan energi yang sama pada gambar tersebut ditunjukkan oleh nomor... ',
                    'answers' => json_encode(['I dan II', 'I dan IV', 'II dan III', 'II dan IV']),
                    'correct' => 0,
                    'foto' => '19.png'
                ],
                [
                    'priority' => 20,
                    'body' => 'Curah hujan yang tinggi di wilayah perbukitan membuat lahan pertanian berkurang kesuburannya karena erosi. Cara yang dapat kita lakukan untuk mengatasi hal tersebut adalah… .',
                    'answers' => json_encode(['Melakukan rotasi tanaman', 'Membuat teras bertingkat', 'Mengganti jenis tanaman palawija', 'Melakukan sistem tumpang sari']),
                    'foto' => '',
                    'correct' => 1
                ],
            ];
        foreach ($questions as $item) {
            Question::create([
                'priority' => $item['priority'],
                'body' => $item['body'],
                'answers' => $item['answers'],
                'correct' => $item['correct'],
                'foto' => $item['foto']
            ]);
        }
    }
}
