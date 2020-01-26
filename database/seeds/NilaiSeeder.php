<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory->define(\App\Nilai::class, function (Faker $faker) {
            return [
                'siswa_id'=> $faker->numberBetween( 14),
                'mapel_id'=> $faker->numberBetween( 5,149),
                'kelas_id'=> $faker->numberBetween( 2),
                'tahun_id'=> $faker->numberBetween( 000000000000000, 999999999999999),
                'tahun_tahun_pel'=> $faker
                'tahun_semester'=> $faker
                'uh1'=> $faker
                'uh2'=> $faker
                'uh3'=> $faker
                'uh4'=> $faker
                'uh5'=> $faker
                'uh6'=> $faker
                'uh7'=> $faker
                'uh8'=> $faker
                'uh9'=> $faker
                'uh10'=> $faker
                'uh11'=> $faker
                'uts'=> $faker
                'uas'=> $faker
            ];
        });
    }
}
