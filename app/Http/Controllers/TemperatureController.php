<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class TemperatureController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function current()
    {

        $client = new \GuzzleHttp\Client();
        if (!\is_null(env('WEATHER_API_KEY'))) {
            $request = $client->get('api.openweathermap.org/data/2.5/weather?q=Tatabánya&appid=' . \env('WEATHER_API_KEY') . '&mode=json&units=metric');
        } else {
            throw new Exception('Missing WEATHER_API_KEY environment variable.');
        }
        $response = $request->getBody();
        $datas['weather'] = json_decode($response, true);

        return view('pages/temperatureCurrent', $datas);
    }
}
