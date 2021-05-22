<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;

class CarouselController extends Controller
{
    private $host = 'http://192.168.42.207/jdih/public';

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
