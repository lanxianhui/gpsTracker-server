<?php

namespace App\Http\Controllers;

use App\Coord;
use App\Http\Requests;
use Request;


class gpsController extends Controller
{

    function guardaDades()
    {

        $input = Request::all();

        Coord::create($input);

        return $input;

    }

    function llegir()
    {
        $config_read = Coord::select('lat', 'lon', 'speed')
            ->orderBy('created_at', 'desc')
            ->take(1)
            ->get();

        return $config_read[0];

    }

    function mostraDades()
    {

        $config_read = Coord::select('lat', 'lon', 'speed')
            ->orderBy('created_at', 'desc')
            ->take(1)
            ->get();

        return view('voregps')
            ->with('dades', $config_read[0]);

    }


}
