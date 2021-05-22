<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SkBupati;

class SkBupatiController extends Controller
{
    public function sk() {
        $data = SkBupati::orderBy('year', 'desc')->get();
        return view('wv.sk', compact([
            'data'
        ]));
    }
}
