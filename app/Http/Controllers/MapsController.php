<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapsController extends Controller
{
    function map(){
        return view('japan_maps.map');
    }
}
