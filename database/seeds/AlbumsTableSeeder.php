<?php

use Illuminate\Database\Seeder;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $albums = [
            ['band_id' => 1,'name' => 'My Bonnie','recorded_date' => '1961-06-21','release_date' => '1962-01-05','number_of_tracks' => 22,'label' => 'Polydor','producer'=>'Bert Kaempfert','genre'=>'Rock and roll'],
            ['band_id' => 1,'name' => 'Please Please Me','recorded_date' => '1962-09-04','release_date' => '1963-03-22','number_of_tracks' => 14,'label' => 'Parlophone','producer'=>'George Martin','genre'=>'Pop'],
            ['band_id' => 2,'name' => 'Physical Graffiti','recorded_date' => '1970-07-01','release_date' => '1975-02-24','number_of_tracks' => 15,'label' => 'Swan Song','producer'=>'Jimmy Page','genre'=>'Hard rock'],
            ['band_id' => 2,'name' => 'Presence','recorded_date' => '1970-07-01','release_date' => '1976-03-31','number_of_tracks' => 7,'label' => 'Swan Song','producer'=>'Jimmy Page','genre'=>'Hard rock'],
            ['band_id' => 5,'name' => 'Ride the Lightning','recorded_date' => '1970-07-01','release_date' => '1976-03-31','number_of_tracks' => 7,'label' => 'Megaforce','producer'=>'Jimmy Page','genre'=>'Hard rock'],
            ['band_id' => 5,'name' => 'Master of Puppets','recorded_date' => '1970-07-01','release_date' => '1976-03-31','number_of_tracks' => 7,'label' => 'Elektra','producer'=>'Jimmy Page','genre'=>'Hard rock'],
            ['band_id' => 5,'name' => 'Kill \'Em All','recorded_date' => '1970-07-01','release_date' => '1983-07-25','number_of_tracks' => 7,'label' => 'Megaforce','producer'=>'Jimmy Page','genre'=>'Hard rock'],
            ['band_id' => 5,'name' => 'Load','recorded_date' => '1996-06-04','release_date' => '1996-06-04','number_of_tracks' => 7,'label' => 'Elektra','producer'=>'Jimmy Page','genre'=>'Hard rock'],
        ];

        DB::table('albums')->insert($albums);
    }
}
