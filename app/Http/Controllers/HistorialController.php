<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function historialView()
    {
        return view('history.history');
    }
}
