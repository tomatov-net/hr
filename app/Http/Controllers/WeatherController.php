<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {
        $oauth = env('YANDEX_API_WEATHER');
        $headers = [
//            'Authorization' => 'OAuth '.$oauth,
//            'Content-Type'=>'application/x-www-form-urlencoded',
            'X-Yandex-API-Key'=> $oauth,
        ];
        $client = new Client(['headers' => $headers]);
        $path = 'https://api.weather.yandex.ru/v1/forecast?lat=53.1507&lon=34.2218&extra=true';

        $request = $client->request('GET', $path);

        $body = $request->getBody();
        $content = $body->getContents();
        $content = json_decode($content, true);
        if($content){
            $result['weather'] = $content['fact'];
            return view('weather.index', $result);
        }
        abort(404);

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }
}
