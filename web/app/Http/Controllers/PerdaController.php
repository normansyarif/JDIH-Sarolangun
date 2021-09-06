<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeraturanDaerah;
use Illuminate\Support\Facades\File; 

class PerdaController extends Controller
{
    public function index() {
        $data = PeraturanDaerah::orderBy('created_at', 'desc')->get();
        return view('panel.perda', compact([
            'data'
        ]));
    }

    public function store(Request $req) {
        $data = new PeraturanDaerah();
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
                $req->file('link')->move(public_path('files/perda'), $fileName);

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
        $data = PeraturanDaerah::find($id);
        $data->title = $req->title;
        $data->year = $req->year;
        $data->no = $req->no;
        $data->tanggal = $req->tanggal;

        if($req->hasFile('link')) {
            $originName = $req->file('link')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $req->file('link')->getClientOriginalExtension();

            if(in_array($extension, ['pdf'])) {
                if(file_exists(public_path('files/perda/' . $data->link))) {
                    File::delete(public_path('files/perda/' . $data->link));
                }

                $fileName = $fileName.'_'.time().'.'.$extension;
                $req->file('link')->move(public_path('files/perda'), $fileName);
                $data->link = $fileName;
            }else{
                return redirect()->back()->with('error', 'Format file tidak didukung');
            }
        }

        $data->save();
        return redirect()->back()->with('success', 'Berhasil mengubah data');

    }

    public function destroy($id) {
        $data = PeraturanDaerah::find($id);

        if(file_exists(public_path('files/perda/' . $data->link))) {
            File::delete(public_path('files/perda/' . $data->link));
        }

        $data->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
    
    // wv
    public function perda() {
        $data = PeraturanDaerah::orderBy('year', 'desc')->get();
        return view('wv.perda', compact([
            'data'
        ]));
    }
}
