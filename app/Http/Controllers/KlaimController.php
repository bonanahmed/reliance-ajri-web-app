<?php

namespace App\Http\Controllers;

use App\Models\Variabel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        if ($request->image_destroy) {
            Storage::delete($request->oldImage);
            Variabel::updateOrCreate([
                'var' => 'faq'
            ], ['image' => null]);
            return redirect()->back()->with('success', 'Image has been deleted!');
        }
        $validatedData = $request->validate([
            'value' => 'required',
            'content' => 'required',
            'image' => 'image|file|max:3072',
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
        if ($request->image_destroy) {
            Storage::delete($request->oldImage);
            Variabel::updateOrCreate([
                'var' => 'prosedur_klaim'
            ], ['image' => null]);
            return redirect()->back()->with('success', 'Image has been deleted!');
        }
        $validatedData = $request->validate([
            'value' => 'required',
            'content' => 'required',
            'image' => 'image|file|max:3072',
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

    public function prosedur_view(Request $request)
    {
        $variabel = $request->variabel;
        return view('web.pages.prosedur', [
            'variabel' => $variabel,
            'head_title' => $variabel->menu_klaim_title->value ?? 'menu_klaim_title',
            'head_sub_title' => $variabel->menu_klaim_sub_title->value ?? 'menu_klaim_sub_title',
            'btn_simulasi' => $variabel->btn_simulasi->value ?? 'btn_simulasi',
        ]);
    }

    public function faq_view(Request $request)
    {
        $variabel = $request->variabel;
        return view('web.pages.faq', [
            'variabel' => $variabel,
            'head_title' => $variabel->menu_klaim_title->value ?? 'menu_klaim_title',
            'head_sub_title' => $variabel->menu_klaim_sub_title->value ?? 'menu_klaim_sub_title',
            'btn_simulasi' => $variabel->btn_simulasi->value ?? 'btn_simulasi',
        ]);
    }

    public function info_view(Request $request)
    {
        $variabel = $request->variabel;
        return view('web.pages.info', [
            'variabel' => $variabel,
            'head_title' => $variabel->menu_klaim_title->value ?? 'menu_klaim_title',
            'head_sub_title' => $variabel->menu_klaim_sub_title->value ?? 'menu_klaim_sub_title',
            'btn_simulasi' => $variabel->btn_simulasi->value ?? 'btn_simulasi',
        ]);
    }
}
