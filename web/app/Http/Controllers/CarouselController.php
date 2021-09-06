<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;

class CarouselController extends Controller
{
    private $host = 'http://wisata.unja.ac.id/aaa';

    public function index() {
        $data = Carousel::orderBy('created_at', 'desc')->get();
        return view('panel.carousel', compact([
            'data'
        ]));
    }

    public function store(Request $req) {
        $data = new Carousel();
        $data->title = $req->title;
        $data->description = $req->description;
        
        if($req->hasFile('image')) {
            $originName = $req->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $req->file('image')->getClientOriginalExtension();

            if(in_array($extension, ['png', 'jpg', 'jpeg'])) {
                $fileName = $fileName.'_'.time().'.'.$extension;
                $req->file('image')->move(public_path('carousel_images'), $fileName);

                $data->image = $fileName;
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
        $data = Carousel::find($id);
        $data->title = $req->title;
        $data->description = $req->description;

        if($req->hasFile('image')) {
            $originName = $req->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $req->file('image')->getClientOriginalExtension();

            if(in_array($extension, ['png', 'jpg', 'jpeg'])) {
                $fileName = $fileName.'_'.time().'.'.$extension;
                $req->file('image')->move(public_path('carousel_images'), $fileName);
                $data->image = $fileName;
            }else{
                return redirect()->back()->with('error', 'Format file tidak didukung');
            }
        }

        $data->save();
        return redirect()->back()->with('success', 'Berhasil mengubah data');

    }

    public function destroy($id) {
        $data = Carousel::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }


    // vw
    public function apiCarousel()
    {
        $data = [];

        $carousels = Carousel::orderBy('created_at', 'desc')->get();

        foreach($carousels as $c) {
            $temp = [];
            $temp['title'] = $c->title;
            $temp['url'] =  $this->host . '/carousel_images/' . $c->image;
            $temp['description'] = $c->description;
            $temp['id'] = $c->id;
            array_push($data, $temp);
        }

        return response($data);
    }
}
