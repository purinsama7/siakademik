<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //data faker indonesia
        $faker = Faker::create('id_ID');
        // membuat data dummy sebanyak 10 record
        for($x = 1; $x <= 10; $x++){
            // insert data dummy Siswa dengan faker
        	DB::table('siswa')->insert([
                'nisn' => $faker->numberBetween( 000000000000000, 999999999999999),
                'nama_depan' => $faker->firstName,
                'nama_belakang' => $faker->lastName,
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->dateTimeBetween('2004-01-01', '2005-12-31')->format('d/m/Y'),
                'jenis_kelamin' => $faker->randomElement($array = array('Laki-laki','Perempuan')),
                'agama' => $faker->randomElement($array = array('Islam','kristen')),
                'alamat' => $faker->address,
                ]);
        }
    }
}
