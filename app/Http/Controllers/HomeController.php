<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Mitra;
use App\Models\News;
use App\Models\Produk;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\Variabel;

class HomeController extends Controller
{
    public function index()
    {
        $mitra = Mitra::where('type', 'rekanan')->get();
        $variabel = Variabel::all();
        $news = News::orderBy('id', 'desc')->limit(3)->get();
        $slider = Slider::all();
        $banner = Banner::all();
        $object = new \stdClass;
        foreach ($variabel as $key => $value) {
            $object->{$value->var} = (object)[
                'value' => $value->value,
                'content' => $value->content,
                'image' => $value->image
            ];
        }
        return view('web.pages.home', [
            'variabel' => $object,
            'mitras' => $mitra,
            'news' => $news,
            'slider' => $slider,
            'banner' => $banner
        ]);
    }
}
