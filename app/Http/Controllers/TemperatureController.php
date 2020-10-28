<?php

namespace App\Http\Controllers;

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
        $request = $client->get('api.openweathermap.org/data/2.5/weather?q=Tatabánya&appid=ede968f60c53a3e967b1a84764656232&mode=json&units=metric');
        $response = $request->getBody();
        $datas['weather'] = json_decode($response, true);

        return view('pages/temperatureCurrent', $datas);
    }
}
