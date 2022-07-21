<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gone;

class GoneController extends Controller
{
    public function create(Request $request)
    {
        $gone = Gone::create([
            'dest' => $request->gone,
            'created_at' => now()
        ]);
        return redirect()->route('todo');
    }
}
