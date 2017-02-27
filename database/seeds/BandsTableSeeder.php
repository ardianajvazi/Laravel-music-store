<?php

use Illuminate\Database\Seeder;

class BandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bands = [
            ['name' => 'The Beatles','start_date' => '1960-01-01','website' => 'http://www.thebeatles.com/','still_active' => true],
            ['name' => 'Led Zeppelin','start_date' => '1968-01-01','website' => 'http://www.ledzeppelin.com/','still_active' => true],
            ['name' => 'The Who','start_date' => '1964-01-01','website' => 'http://www.thewho.com/','still_active' => true],
            ['name' => 'Radiohead','start_date' => '1985-01-01','website' => 'http://www.radiohead.com/','still_active' => true],
            ['name' => 'Metallica','start_date' => '1981-01-01','website' => 'http://www.metallica.com/','still_active' => true],
            ['name' => 'Pink Floyd','start_date' => '1965-01-01','website' => 'http://www.pinkfloyd.com/','still_active' => true],
        ];

        DB::table('bands')->insert($bands);
    }
}
