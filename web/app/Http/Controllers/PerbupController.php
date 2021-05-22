<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeraturanBupati;

class PerbupController extends Controller
{
    public function perbup() {
        $data = PeraturanBupati::orderBy('year', 'desc')->get();
        return view('wv.perbup', compact([
            'data'
        ]));
    }
}
