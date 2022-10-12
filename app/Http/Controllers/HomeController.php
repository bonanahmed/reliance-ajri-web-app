<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use App\Models\Variabel;

class HomeController extends Controller
{
    public function index()
    {
        $variabel = Variabel::all();
        $mitra = Mitra::all();
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
            'mitras' => $mitra
        ]);
    }
}
