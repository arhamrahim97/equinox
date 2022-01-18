<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TentangTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('tentang')->delete();

        DB::table('tentang')->insert(array(
            0 =>
            array(
                'id' => 1,
                'nama' => 'MOU',
                'konten' => '<p>MoU adalah perjanjian pendahuluan, dalam arti nantinya akan diikuti dan dijabarkan dalam perjanjian lain yang mengaturnya secara detail, karena itu, memorandum of understanding berisikan hal-hal yang pokok saja. Adapun mengenai aspek lain-lain dari MoU relatif sama dengan perjanjian lainnya.</p>

<p>Dari penjelasan di atas dapat diambil kesimpulan bahwa MoU bukanlah suatu kontrak dan masih merupakan pra kontrak. Oleh karena itu, di dalam MoU biasanya dicantumkan&nbsp;<em>&ldquo;intention to create legal relation&rdquo;</em>&nbsp;oleh dua pihak tersebut.</p>

<p>Ada juga MoU yang terdapat konsekuensi hukum bagi pihak yang melanggarnya.&nbsp;Mengapa konsekuensi hukum ditambahkan ke dalam MoU? Terdapat tiga pertimbangan menambahkan konsekuensi hukum tersebut, yaitu;</p>

<ol>
<li>Agar kedua belah pihak terhindar dari ketidakseriusan salah satu pihak pembuat MoU, misalnya membatalkan kesepakatan secara sepihak tanpa alasan yang jelas.</li>
<li>Agar kedua belah pihak terhindar dari berbagai kerugian, baik finansial maupun non finansial yang telah dikeluarkan pihak-pihak tersebut.</li>
<li>Untuk menjaga kerahasian informasi/ data yang diberikan selama kegiatan pra kontrak</li>
</ol>

<h1><strong>Ciri-Ciri Nota Kesepahaman (MoU)</strong></h1>

<p>Kita dapat mengenali suatu nota kesepahaman dengan melihat karakteristiknya. Mengacu pada&nbsp;<em>arti MoU</em>&nbsp;di atas, adapun ciri-ciri MoU adalah sebagai berikut:</p>

<ul>
<li>Umumnya isi MoU dibuat secara ringkas, bahkan seringkali hanya dibuat satu halaman saja.</li>
<li>Isi di dalam MoU adalah hal-hal yang sifatnya pokok atau umum saja.</li>
<li>MoU sifatnya pendahuluan, dimana akan diikuti oleh kesepakatan lain yang isinya lebih detail.</li>
<li>MoU jangka memiliki jangka waktu yang cukup singkat, misalnya sebulan hingga satu tahun. Jika tidak ada tindak lanjut dengan perjanjian yang lebih ringci dari kedua belah pihak, maka nota kesepakatan tersebut batal.</li>
<li>Umumnya nota kesepahaman dibuat dalam bentuk perjanjian di bawah tangan.</li>
<li>MoU digunakan sebagai dasar untuk membuat perjanjian untuk kepentingan banyak pihak, misalnya investor, kreditor, pemegang saham, pemerintah, dan lainnya.</li>
</ul>',
                'bahasa' => 'Indonesia',
                'created_at' => NULL,
                'updated_at' => '2022-01-12 07:36:50',
            ),
            1 =>
            array(
                'id' => 2,
                'nama' => 'MOA',
                'konten' => '<p>Memorandum of Agreement (MOA) adalah dokumen tertulis yang menggambarkan hubungan kerja sama antara dua pihak yang ingin bekerja sama dalam suatu proyek atau untuk memenuhi tujuan yang disepakati. MOA berfungsi sebagai dokumen hukum dan menjelaskan persyaratan dan rincian perjanjian kemitraan. MOA lebih formal daripada perjanjian verbal, tetapi kurang formal daripada kontrak. Organisasi dapat menggunakan MOA untuk menetapkan dan menjabarkan perjanjian kolaboratif, termasuk kemitraan layanan atau perjanjian untuk memberikan bantuan teknis dan pelatihan. MOA dapat digunakan terlepas dari apakah uang akan ditukar atau tidak sebagai bagian dari perjanjian.</p>

<h1><strong>Format khas dari MOA meliputi:</strong></h1>

<ul>
<li>&nbsp;&nbsp;&nbsp;&nbsp;Wewenang</li>
<li>&nbsp;&nbsp;&nbsp;&nbsp;Tujuan Perjanjian</li>
<li>&nbsp;&nbsp;&nbsp;&nbsp;Nama pihak yang terlibat</li>
<li>&nbsp;&nbsp;&nbsp;&nbsp;Deskripsi singkat tentang ruang lingkup pekerjaan</li>
<li>&nbsp;&nbsp;&nbsp;&nbsp;Kewajiban keuangan masing-masing pihak, jika berlaku</li>
<li>&nbsp;&nbsp;&nbsp;&nbsp;Perjanjian tanggal berlaku</li>
<li>&nbsp;&nbsp;&nbsp;&nbsp;Kontak kunci untuk setiap pihak yang terlibat</li>
<li>&nbsp;&nbsp;&nbsp;&nbsp;Penjelasan terperinci tentang Peran dan Tanggung Jawab</li>
<li>&nbsp;&nbsp;&nbsp;&nbsp;Jadwal Pembayaran jika Berlaku</li>
<li>&nbsp;&nbsp;&nbsp;&nbsp;Jangka waktu perjanjian</li>
<li>&nbsp;&nbsp;&nbsp;&nbsp;Modifikasi Pengakhiran</li>
<li>&nbsp;&nbsp;&nbsp;&nbsp;Tanda Tangan Prinsipal Para Pihak</li>
</ul>',
                'bahasa' => 'Indonesia',
                'created_at' => NULL,
                'updated_at' => '2022-01-12 07:37:45',
            ),
            2 =>
            array(
                'id' => 3,
                'nama' => 'IA',
                'konten' => '<p>Sementara IA merupakan wujud pelaksanaan dari MoA.</p>',
                'bahasa' => 'Indonesia',
                'created_at' => NULL,
                'updated_at' => '2022-01-12 07:39:22',
            ),
            3 =>
            array(
                'id' => 4,
                'nama' => 'MOU',
                'konten' => '<p>The MoU is a preliminary agreement, in the sense that it will be followed and elaborated in other agreements that regulate it in detail, therefore, the memorandum of understanding contains only the main points. As for the other aspects of the MoU it is relatively the same as other agreements.<br />
<br />
From the above explanation it can be concluded that the MoU is not a contract and is still a pre-contract. Therefore, in the MoU it is usually stated &quot;intention to create legal relations&quot; by the two parties.<br />
<br />
There are also MoUs that have legal consequences for those who break them. Why were the legal consequences added to the MoU? There are three considerations adding these legal consequences, namely;<br />
<br />
&nbsp;&nbsp;&nbsp; 1.So that both parties avoid the seriousness of one of the parties to the MoU, for example canceling an agreement unilaterally without a clear reason.<br />
&nbsp;&nbsp;&nbsp; 2.So that both parties avoid various losses, both financial and non-financial that have been incurred by these parties.<br />
&nbsp;&nbsp;&nbsp; 3.To maintain the confidentiality of information / data provided during pre-contract activities.<br />
<br />
<strong>Characteristics of Memorandum of Understanding (MoU)</strong></p>

<p><br />
We can recognize a memorandum of understanding by looking at its characteristics. Referring to the meaning of the MoU above, the characteristics of the MoU are as follows:<br />
<br />
&nbsp;&nbsp;&nbsp; - Generally the contents of the MoU are made concise, often even only made in one page.<br />
&nbsp;&nbsp;&nbsp; - The contents in the MoU are things that are basic or general in nature.<br />
&nbsp;&nbsp;&nbsp; - The MoU is preliminary, which will be followed by other agreements whose contents are more detailed.<br />
&nbsp;&nbsp;&nbsp; - The term MoU has a fairly short period of time, for example a month to one year. If there is no follow up with a more concise agreement from both parties, then the</p>

<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; memorandum of agreement is canceled.<br />
&nbsp;&nbsp;&nbsp; - Generally a memorandum of understanding is made in the form of an underhand agreement.<br />
&nbsp;&nbsp;&nbsp; - The MoU is used as a basis for making agreements for the interests of many parties, such as investors, creditors, shareholders, the government, and others.</p>',
                'bahasa' => 'Inggris',
                'created_at' => NULL,
                'updated_at' => '2022-01-12 07:40:49',
            ),
            4 =>
            array(
                'id' => 5,
                'nama' => 'MOA',
                'konten' => '<p>Memorandum of Agreement (MOA) is a written document that describes a cooperative relationship between two parties who want to work together on a project or to meet agreed upon goals. The MOA functions as a legal document and explains the terms and details of the partnership agreement. MOA is more formal than verbal agreement, but less formal than contract. Organizations can use the MOA to establish and define collaborative agreements, including service partnerships or agreements to provide technical assistance and training. The MOA can be used regardless of whether money will be exchanged or not as part of the agreement.</p>

<p>Typical formats of MOA include:</p>

<ul>
<li>Authority</li>
<li>Purpose of the Agreement</li>
<li>Names of parties involved</li>
<li>A brief description of the scope of work</li>
<li>Financial obligations of each party, if applicable</li>
<li>Agreement date applies</li>
<li>Key contacts for each party involved</li>
<li>Detailed description of roles and responsibilities</li>
<li>Payment Schedule if Applicable</li>
<li>Duration of the agreement</li>
<li>Termination Modifications</li>
<li>Principal&#39;s Signature of the Parties</li>
</ul>',
                'bahasa' => 'Inggris',
                'created_at' => NULL,
                'updated_at' => '2022-01-12 07:41:01',
            ),
            5 =>
            array(
                'id' => 6,
                'nama' => 'IA',
                'konten' => '<p>While IA is a form of implementation of the MoA.</p>',
                'bahasa' => 'Inggris',
                'created_at' => NULL,
                'updated_at' => '2022-01-12 07:41:45',
            ),
        ));
    }
}
