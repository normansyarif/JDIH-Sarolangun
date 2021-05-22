<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeraturanDaerah;

class PerdaController extends Controller
{
    public function perda() {
        $data = PeraturanDaerah::orderBy('year', 'desc')->get();
        return view('wv.perda', compact([
            'data'
        ]));
    }
}
