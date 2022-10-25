<?php

namespace App\Http\Controllers;

use App\Models\Variabel;
use Illuminate\Http\Request;

class KlaimController extends Controller
{
    public function faq()
    {
        $variabel = Variabel::all();
        $object = new \stdClass;
        foreach ($variabel as $key => $value) {
            $object->{$value->var} = (object)[
                'value' => $value->value,
                'content' => $value->content,
                'image' => $value->image
            ];
        }
        return view('cms.faq.update', [
            'variabel' => $object
        ]);
    }

    public function faq_save(Request $request)
    {
        $validatedData = $request->validate([
            'value' => 'required',
            'content' => 'required',
            'image' => 'image|file|max:1024',
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('faq-image');
        }
        $validatedData['updated_by'] = auth()->user()->id;
        Variabel::updateOrCreate([
            'var' => 'faq'
        ], $validatedData);
        return back()->with('success', 'Data has been updated');
    }

    public function prosedur()
    {
        $variabel = Variabel::all();
        $object = new \stdClass;
        foreach ($variabel as $key => $value) {
            $object->{$value->var} = (object)[
                'value' => $value->value,
                'content' => $value->content,
                'image' => $value->image
            ];
        }
        return view('cms.klaim.update', [
            'variabel' => $object
        ]);
    }

    public function prosedur_save(Request $request)
    {
        $validatedData = $request->validate([
            'value' => 'required',
            'content' => 'required',
            'image' => 'image|file|max:1024',
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('prosedur-klaim-image');
        }
        $validatedData['updated_by'] = auth()->user()->id;
        Variabel::updateOrCreate([
            'var' => 'prosedur_klaim'
        ], $validatedData);
        return back()->with('success', 'Data has been updated');
    }
}
