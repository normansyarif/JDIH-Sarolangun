<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\File; 

class NewsController extends Controller
{
    // private $host = 'http://wisata.unja.ac.id/aaa';
    private $host = 'http://192.168.42.56/web/public';

    private function generateThumbnail($imgSrc, $filename, $extension) {
        //getting the image dimensions
        list($width, $height) = getimagesize($imgSrc);

        //saving the image into memory (for manipulation with GD Library)

        if($extension == 'jpg' || $extension == 'jpeg') {
            $myImage = imagecreatefromjpeg($imgSrc);
        }else{
            $myImage = imagecreatefrompng($imgSrc);
        }
        

        // calculating the part of the image to use for thumbnail
        if ($width > $height) {
            $y = 0;
            $x = ($width - $height) / 2;
            $smallestSide = $height;
        } else {
            $x = 0;
            $y = ($height - $width) / 2;
            $smallestSide = $width;
        }

        // copying the part into thumbnail
        $thumbSize = 100;
        $thumb = imagecreatetruecolor($thumbSize, $thumbSize);
        imagecopyresampled($thumb, $myImage, 0, 0, $x, $y, $thumbSize, $thumbSize, $smallestSide, $smallestSide);
        imagejpeg($thumb, "news_images/thumbs/" . $filename , 100);
    }

    public function index() {
        $data = News::orderBy('created_at', 'desc')->get();
        return view('panel.news.index', compact([
            'data'
        ]));
    }

    public function create(Request $req) {
        return view('panel.news.create');
    }

    public function store(Request $req) {
        $news = new News;
        $news->title = $req->title;
        $news->content = $req->content;

        if($req->hasFile('image')) {
            $originName = $req->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $req->file('image')->getClientOriginalExtension();

            if(in_array($extension, ['jpg', 'jpeg', 'png'])) {
                $fileName = $fileName.'_'.time().'.'.$extension;
                $req->file('image')->move(public_path('news_images'), $fileName);
                $this->generateThumbnail(public_path('news_images/' . $fileName), $fileName, $extension);

                $news->image = $fileName;
                $news->keterangan = date('Y-m-d H:i', time());
                $news->save();
                return redirect(route('panel.news'))->with('success', 'Berhasil menambah berita');
            }else{
                return redirect()->back()->with('error', 'Format file tidak didukung');
            }
        }else{
            return redirect()->back()->with('error', 'Gambar belum diupload');
        }
    }

    public function edit(Request $req, $id) {
        $item = News::findOrFail($id);
        return view('panel.news.edit', compact([
            'item'
        ]));
    }

    public function update(Request $req, $id) {
        $news = News::findOrFail($id);
        $news->title = $req->title;
        $news->content = $req->content;

        if($req->hasFile('image')) {
            $originName = $req->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $req->file('image')->getClientOriginalExtension();

            if(in_array($extension, ['jpg', 'jpeg', 'png'])) {
                // delete the old ones
                $img = file_exists(public_path('news_images/' . $news->image));
                $thm = file_exists(public_path('news_images/thumbs/' . $news->image));
                if ($img && $thm) {
                    File::delete(public_path('news_images/' . $news->image));
                    File::delete(public_path('news_images/thumbs/' . $news->image));
                }

                $fileName = $fileName.'_'.time().'.'.$extension;
                $req->file('image')->move(public_path('news_images'), $fileName);
                $this->generateThumbnail(public_path('news_images/' . $fileName), $fileName, $extension);

                $news->image = $fileName;
                
            }else{
                return redirect()->back()->with('error', 'Format file tidak didukung');
            }
        }

        $news->save();
        return redirect(route('panel.news'))->with('success', 'Berhasil mengubah berita');
    }

    public function destroy($id) {
        $news = News::findOrFail($id);
        $news->delete();
        
        $img = file_exists(public_path('news_images/' . $news->image));
        $thm = file_exists(public_path('news_images/thumbs/' . $news->image));
        if ($img && $thm) {
            File::delete(public_path('news_images/' . $news->image));
            File::delete(public_path('news_images/thumbs/' . $news->image));
        }

        return redirect()->back()->with('success', 'Berhasil menghapus berita');
    }

    // api & vw
    private function dateFormat($timestamp, $showTime = false)
    {
        $daysArray = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $monthsArray = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $day = $daysArray[date('N', $timestamp) - 1];
        $date = date('j', $timestamp);
        $month = $monthsArray[date('n', $timestamp) - 1];
        $year = date('Y', $timestamp);
        $time = date('H:i', $timestamp);

        $returnValue = $day . ', ' . $date . ' ' . $month . ' ' . $year;

        if ($showTime) {
            $returnValue .= ', ' . $time;
        }

        return $returnValue;
    }

    public function apiIndex(Request $req)
    {
        $data = [];

        $news = News::orderBy('created_at', 'desc');

        if (!empty($req->limit)) {
            $news = $news->take($req->limit);
        }

        $news = $news->get();

        foreach($news as $n) {
            $temp = [];
            $temp['id'] = $n->id;
            $temp['title'] = $n->title;
            $temp['url'] = $this->host . '/news/' . $n->id;
            $temp['image'] = $this->host . '/news_images/thumbs/' . $n->image;
            $temp['date'] = $this->dateFormat(strtotime($n->created_at), true);
            array_push($data, $temp);
        }

        return response($data);
    }

    public function show($id) {
        $news = News::find($id);

        if($news) {
            $item = [];
            $item['image'] = $this->host . '/news_images/' . $news->image;
            $item['title'] = $news->title;
            $item['date'] = $this->dateFormat(strtotime($news->created_at), true);
            $item['content'] = $news->content;
            $item = (object) $item;
            return view('wv.news', compact([
                'item'
            ]));
        }else{
            return abort(404);
        }
    }
}
