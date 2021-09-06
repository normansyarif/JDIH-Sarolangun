<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeraturanBupati;
use Illuminate\Support\Facades\File; 

class PerbupController extends Controller
{
    public function index() {
        $data = PeraturanBupati::orderBy('created_at', 'desc')->get();
        return view('panel.perbup', compact([
            'data'
        ]));
    }

    public function store(Request $req) {
        $data = new PeraturanBupati();
        $data->title = $req->title;
        $data->year = $req->year;
        $data->no = $req->no;
        $data->tanggal = $req->tanggal;
        
        if($req->hasFile('link')) {
            $originName = $req->file('link')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $req->file('link')->getClientOriginalExtension();

            if(in_array($extension, ['pdf'])) {
                $fileName = $fileName.'_'.time().'.'.$extension;
                $req->file('link')->move(public_path('files/perbup'), $fileName);

                $data->link = $fileName;
                $data->keterangan = date('Y-m-d H:i', time());
                $data->save();
                return redirect()->back()->with('success', 'Berhasil menambah data');
            }else{
                return redirect()->back()->with('error', 'Format file tidak didukung');
            }
        }else{
            return redirect()->back()->with('error', 'Pilih file terlebih dahulu');
        }
    }

    public function update(Request $req, $id) {
        $data = PeraturanBupati::find($id);
        $data->title = $req->title;
        $data->year = $req->year;
        $data->no = $req->no;
        $data->tanggal = $req->tanggal;

        if($req->hasFile('link')) {
            $originName = $req->file('link')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $req->file('link')->getClientOriginalExtension();

            if(in_array($extension, ['pdf'])) {
                if(file_exists(public_path('files/perbup/' . $data->link))) {
                    File::delete(public_path('files/perbup/' . $data->link));
                }

                $fileName = $fileName.'_'.time().'.'.$extension;
                $req->file('link')->move(public_path('files/perbup'), $fileName);
                $data->link = $fileName;
            }else{
                return redirect()->back()->with('error', 'Format file tidak didukung');
            }
        }

        $data->save();
        return redirect()->back()->with('success', 'Berhasil mengubah data');

    }

    public function destroy($id) {
        $data = PeraturanBupati::find($id);

        if(file_exists(public_path('files/perbup/' . $data->link))) {
            File::delete(public_path('files/perbup/' . $data->link));
        }
        
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }

    public function perbup() {
        $data = PeraturanBupati::orderBy('year', 'desc')->get();
        return view('wv.perbup', compact([
            'data'
        ]));
    }
}
