<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WilayahController extends Controller
{
    //
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
    public function kabupaten(Request $request)
    {
        $id=$request->id;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.goapi.id/v1/regional/kota?provinsi_id=".$id,
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
            $response = curl_exec($curl);
        }
        curl_close($curl);
        return $response;
    }
    public function kecamatan(Request $request)
    {
        $id=$request->id;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.goapi.id/v1/regional/kecamatan?kota_id=".$id,
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
            $response = curl_exec($curl);
        }
        curl_close($curl);
        return $response;
    }
    public function kelurahan(Request $request)
    {
        $id=$request->id;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.goapi.id/v1/regional/kelurahan?kecamatan_id=".$id,
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
            $response = curl_exec($curl);
        }
        curl_close($curl);
        return $response;
    }
}
