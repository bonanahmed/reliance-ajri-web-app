<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_kumpulan()
    {
        return view('cms.produk.index', [
            'produk' => Produk::where('type', 'kumpulan')->orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function index_individu()
    {
        return view('cms.produk.indexIndividu', [
            'produk' => Produk::where('type', 'individu')->orderBy('id', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('produk-image');
        }

        $validatedData['created_by'] = auth()->user()->id;
        Produk::create($validatedData);
        return redirect('/c/produk')->with('success', 'Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Produk::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function individu(Request $request)
    {
        $variabel = $request->variabel;
        return view('web.pages.produkIndividu', [
            'title' => 'Produk Individu',
            'produk' => Produk::where('type', 'individu')->first(),
            'head_title' => $variabel->produk_title->value ?? 'produk_title',
            'head_sub_title' => $variabel->produk_sub_title->value ?? 'produk_sub_title',
            'btn_simulasi' => $variabel->btn_simulasi->value ?? 'btn_simulasi',
        ]);
    }

    public function kumpulan(Request $request, Produk $produk)
    {
        $variabel = $request->variabel;
        return view('web.pages.produkKumpulan', [
            'produk' => $produk,
            'head_title' => $variabel->produk_title->value ?? 'produk_title',
            'head_sub_title' => $variabel->produk_sub_title->value ?? 'produk_sub_title',
            'btn_simulasi' => $variabel->btn_simulasi->value ?? 'btn_simulasi',
            'list' => Produk::where('type', 'kumpulan')->get()
        ]);
    }
}
