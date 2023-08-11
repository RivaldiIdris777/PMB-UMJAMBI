<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    protected $table = 'tb_provinsi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
    ];

    public function provinsi()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.goapi.id/v1/regional/provinsi",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
                'X-API-KEY: hF2515ZMpVMI8qiy6SXJYRKuOGUsOO'
            ),
        ));
        if (curl_error($curl)) {
            $response = curl_error($curl);
        } else {
            $response = json_decode(curl_exec($curl));
        }
        curl_close($curl);
        return $response;
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
