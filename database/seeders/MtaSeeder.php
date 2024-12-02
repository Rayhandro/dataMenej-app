<?php

namespace Database\Seeders;

use App\Models\Mta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MtaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mta::create([
            'mta_code' => '6030101000',
            'event' => 'Exhibition-Exhibition',
            'description' => 'aktivitas pameran atau launching produk baru baik di dalam maupun di luar negeri, seperti sewa dan dekorasi ruang pamer, umbul-umbul, spanduk, stand person, pamflet, material kit dan sebagainya.',
        ]);

        Mta::create([
            'mta_code' => '6030102000',
            'event' => 'Exhibition-Marketing Public Relation',
            'description' => 'advertorial terkait produk-produk Indosat di media cetak dan biaya konsultan yang meriset dampak dari suatu iklan.',
        ]);

        Mta::create([
            'mta_code' => '6030104000',
            'event' => 'Exhibition-Community Activity',
            'description' => 'branding kaos, jaket, topi dll kegiatan kelompok-kelompok komunitas hobby atau profesi. ',
        ]);

        Mta::create([
            'mta_code' => '6030201000',
            'event' => 'Promotion-Sponsorship',
            'description' => 'acara/event yang diselenggarakan pihak lain dalam rangka promosi produk perusahaan. ',
        ]);

        Mta::create([
            'mta_code' => '6030202000',
            'event' => '-',
            'description' => 'produksi massal merchandise dan gift (dengan branding produk Indosat) secara umum (bukan diproduksi untuk suatu event khusus).',
        ]);

        Mta::create([
            'mta_code' => '6030203000',
            'event' => 'Promotion-Brochure',
            'description' => 'pencetakan dan distribusi pamflet/brosur/stiker dalam rangka promosi produk perusahaan.',
        ]);
    }
}
