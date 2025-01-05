<?php

namespace Database\Seeders;


use App\Models\Image;
use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = Trip::get();
        foreach($rows as $row){
            for( $i = 0 ; $i < 3 ; $i++ ){
               Image::create(['image' => 'background_url_0.jpg','trip_id' => $row->id]);
            }
        }
    }
}
