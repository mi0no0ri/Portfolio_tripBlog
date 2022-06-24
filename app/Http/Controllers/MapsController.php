<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapsController extends Controller
{
    function gallery(){
        return view('japan_maps.gallery');
    }
}
