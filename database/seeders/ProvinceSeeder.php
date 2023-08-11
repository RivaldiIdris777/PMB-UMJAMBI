<?php

namespace Database\Seeders;

use App\Models\Provinsi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
         //Fetch Rest API
         $response = Http::withHeaders([
        	//api key rajaongkir
            'key' => config('services.goapi.key'),
        ])->get('https://api.goapi.id/v1/regional/provinsi');

        //loop data from Rest API
        foreach($response['goapi']['results'] as $province) {

            //insert ke table "provinces"
            Provinsi::create([
                'id'          => $province['province_id'],
                'nama'        => $province['province']
            ]);

        }
    }
}
