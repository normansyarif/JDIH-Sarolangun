<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    private $host = 'http://192.168.42.207/jdih/public';

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
            $temp['image'] = $this->host . '/news_images/' . $n->image;
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
