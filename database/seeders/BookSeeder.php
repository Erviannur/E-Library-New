<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::insert([
            [
                'image' => 'Bumi.jpg',
                'title' => 'Bumi',
                'slug' => 'bumi',
                'author_id' => 1,
                'publisher_id' => 1,
                'publication_year' => '2014',
                'isbn' => '978-602-030-112-9',
                'page' => '440',
                'genre_id' => 2,
                'country_id' => 13,
                'synopsis' => 'Bumi, merupakan rangkaian awal dari kisah sekelompok anak remaja berkemampuan istimewa. Mereka yang istimewa, mampu pergi ke dunia parallel bumi, bertemu dengan klan lain dan berhadapan dengan Tamus yang memiliki ambisi membebaskan si Tanpa Mahkota dan kemudian, menguasai bumi.',
                'file' => 'Bumi.pdf',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => 'Ibu_Ayam.png',
                'title' => 'Ibu Ayam : Mother Hen',
                'slug' => 'ibu-ayam-mother-hen',
                'author_id' => 4,
                'publisher_id' => 4,
                'publication_year' => '2017',
                'isbn' => '978-602-8553-40-7',
                'page' => '14',
                'genre_id' => 4,
                'country_id' => 13,
                'synopsis' => 'Cerita ini mengisahkan tentang rasa kasih sayang ibu ayam pada anaknya. Ibu ayam mencari tempat terbaik untuk menyimpan telur agar telurnya menetas. Ibu ayam juga menjaga dan mengerami telurnya selama berhari-hari',
                'file' => 'Ibu_Ayam_Mother_Hen.pdf',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => 'Laut_Bercerita.jpg',
                'title' => 'Laut Bercerita',
                'slug' => 'laut-bercerita',
                'author_id' => 5,
                'publisher_id' => 5,
                'publication_year' => '2017',
                'isbn' => '978-602-4246-94-5',
                'page' => '379',
                'genre_id' => 1,
                'country_id' => 13,
                'synopsis' => 'Laut Bercerita, novel terbaru Leila S. Chudori, bertutur tentang kisah keluarga yang kehilangan, sekumpulan sahabat yang merasakan kekosongan di dada, sekelompok orang yang gemar menyiksa dan lancar berkhianat, sejumlah keluarga yang mencari kejelasan makam anaknya, dan tentang cinta yang tak akan luntur.',
                'file' => 'Laut_Bercerita.pdf',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => 'Dilan_1.jpg',
                'title' => 'Dia Adalah Dilanku Tahun 1990',
                'slug' => 'dia-adalah-dilanku-tahun-1990',
                'author_id' => 6,
                'publisher_id' => 6,
                'publication_year' => '2014',
                'isbn' => '978-602-7870-41-3',
                'page' => '348',
                'genre_id' => 3,
                'country_id' => 13,
                'synopsis' => 'Dia adalah Dilanku Tahun 1990 edisi 1 berwarna biru muda dengan tokoh Dilan dan sepeda motornya yang dijadikan covernya.  Nah, gambar Dilan yang menggunakan seragam SMA dengan gaya yang sangat santai  yang terletak di Cover diilustrasikan sendiri  oleh sang penulis Pidi Baiq. Gambar yang terdapat di cover menjadi ciri dari isi novel yang menggambarkan kehidupan remaja. Dibawah gambar Dilan tercantum quotes Pidi Baiq menambah kesan menarik bagi sampulnya.',
                'file' => 'Dilan_1.pdf',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => 'Dilan_2.jpg',
                'title' => 'Dia Adalah Dilanku Tahun 1991',
                'slug' => 'dia-adalah-dilanku-tahun-1991',
                'author_id' => 6,
                'publisher_id' => 7,
                'publication_year' => '2014',
                'isbn' => '978-602-7870-99-4',
                'page' => '345',
                'genre_id' => 3,
                'country_id' => 13,
                'synopsis' => 'Dilan : Dia Adalah Dilanku Tahun 1990” bercerita tentang kisah cinta dua remaja Bandung pada tahun 90an. Berawal dari seorang siswa bernama Dilan yang jatuh cinta dengan siswi pindahan dari SMA di Jakarta bernama Milea. Dilan memiliki beragam cara untuk mendekati dan mencuri perhatian Milea.',
                'file' => 'Dilan_2.pdf',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => 'Dilan_3.jpg',
                'title' => 'Dilan 3',
                'slug' => 'dilan-3',
                'author_id' => 6,
                'publisher_id' => 6,
                'publication_year' => '2014',
                'isbn' => '978-602-0851-56-3',
                'page' => '354',
                'genre_id' => 3,
                'country_id' => 13,
                'synopsis' => 'Milea, Suara dari Dilan adalah sebuah novel karya Pidi Baiq yang diterbitkan oleh Pastel Books pada tahun 2016. Novel tersebut adalah sekuel dari novel Dilan: Dia adalah Dilanku Tahun 1990 dan Dilan Bagian Kedua: Dia adalah Dilanku Tahun 1991. Seperti halnya dua novel sebelumnya, karya tersebut diadaptasi ke dalam film Milea.',
                'file' => 'Dilan_3.pdf',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
