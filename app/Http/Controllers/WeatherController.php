<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index() {
        $widget = null;

        try {

            $opts = array(
                'http' => array(
                    'method' => "GET",
                    'header' => "X-Yandex-API-Key: 22f8dbdc-f662-48f8-b734-e55223cd3284",
                ),
            );
            
            $url = "https://api.weather.yandex.ru/v2/informers?lat=53.2521&lon=34.3717";
            $context = stream_context_create($opts);
            $contents = file_get_contents($url, false, $context);
            $clima = json_decode($contents);
            $widget = view('weather.yandex', compact('clima'))->render();
        } catch (\Exception $e) {
            logger($e->getMessage());
        }

        return view('weather.weather', compact('widget'));
    }
}
