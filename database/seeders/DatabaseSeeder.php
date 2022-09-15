<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Biodata;
use App\Models\Kelas;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Biodata::factory(10)->create();

        Kelas::create([
            "kelas"=>"XI-RPL 3",
            "wali_kelas"=>"Wulan",
        ]);

        Kelas::create([
            "kelas"=>"XI-MM 1",
            "wali_kelas"=>"Mada",
        ]);

        Kelas::create([
            "kelas"=>"XI-RPL 2",
            "wali_kelas"=>"Edi",
        ]);

    }
}
