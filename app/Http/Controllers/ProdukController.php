<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Variabel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/c/produk/kumpulan');
    }
    public function index_kumpulan(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Produk::where('type', 'kumpulan'))
                ->addColumn('action', function ($produk) {
                    // $action = '<a href="/c/produk/' . $produk->slug . '" class="badge bg-primary" style="margin-right: 4.5px;"><span data-feather="eye"></span></a>';
                    $action = '<a href="/c/produk/' . $produk->slug . '/edit" class="badge bg-success"><span data-feather="edit-2"></span></a>';
                    $action .= '<form action="/c/produk/' . $produk->slug . '" class="d-inline" method="post">
                ' . method_field("delete") . '
                ' . csrf_field() . '
                <button class="badge bg-danger border-0"><span data-feather="trash-2"></span></button>
            </form>';
                    return $action;
                })
                ->addIndexColumn()
                ->editColumn('created_at', function ($data) {
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at);
                    return $formatedDate;
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('cms.produk.index');
    }

    public function index_top_individu()
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
        return view('cms.produk.indexIndividuTop', [
            'variabel' => $object
        ]);
    }

    public function index_bottom_individu()
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
        return view('cms.produk.indexIndividuBottom', [
            'variabel' => $object
        ]);
    }

    public function save_top_individu(Request $request)
    {
        if ($request->image_destroy) {
            Storage::delete($request->oldImage);
            Variabel::updateOrCreate([
                'var' => 'produk_individu_sec1'
            ], ['image' => null]);
            return redirect()->back()->with('success', 'Image has been deleted!');
        }
        $validatedData = $request->validate([
            'value' => 'required',
            'content' => 'required',
            'image' => 'image|file|max:3072',
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('produk-image');
        }
        Variabel::updateOrCreate([
            'var' => 'produk_individu_sec1'
        ], $validatedData);
        return redirect('/c/produk/individu/top')->with('success', 'Data has been updated');
    }

    public function save_bottom_individu(Request $request)
    {
        $validatedData = $request->validate([
            'value' => 'required',
            'content' => 'required',
        ]);
        // if ($request->file('image')) {
        //     $validatedData['image'] = $request->file('image')->store('produk-image');
        // }
        Variabel::updateOrCreate([
            'var' => 'produk_individu_sec2'
        ], $validatedData);
        return redirect('/c/produk/individu/bot')->with('success', 'Data has been updated');
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
            'image' => 'image|file|max:3072',
            'alt' => '',
            'meta_keywords' => '',
            'meta_description' => '',
            'meta_title' => '',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('produk-image');
        }

        $validatedData['created_by'] = auth()->user()->id;
        Produk::create($validatedData);
        return redirect('/c/produk/kumpulan')->with('success', 'Data has been added');
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
    public function edit(Produk $produk)
    {
        return view('cms.produk.update', [
            'produk' => $produk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        if ($request->image_destroy) {
            Storage::delete($request->oldImage);
            Produk::where('id', $produk->id)
                ->update(['image' => null]);
            return redirect()->back()->with('success', 'Image has been deleted!');
        }
        $rules = [
            'title' => 'required',
            'body' => 'required',
            'image' => 'image|file|max:3072',
            'alt' => '',
            'meta_keywords' => '',
            'meta_description' => '',
            'meta_title' => '',
        ];

        if ($request->slug != $produk->slug) {
            $rules['slug'] = 'required';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('produk-image');
        }

        Produk::where('id', $produk->id)
            ->update($validatedData);
        return redirect('/c/produk/kumpulan')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        if ($produk->image) {
            Storage::delete($produk->image);
        }
        Produk::destroy($produk->id);
        return redirect('/c/produk')->with('success', 'Produk has been deleted');
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
            'head_title' => $variabel->produk_title->value ?? 'produk_title',
            'head_sub_title' => $variabel->produk_sub_title->value ?? 'produk_sub_title',
            'var' => $variabel
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


    public function editDiagram()
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
        return view('cms.produk.produkIndividuDiagram', [
            'variabel' => $object
        ]);
    }

    public function saveDiagram(Request $request)
    {
        if ($request->image_destroy) {
            Storage::delete($request->oldImage);
            Variabel::updateOrCreate([
                'var' => 'produk_diagram'
            ], ['image' => null]);
            return redirect()->back()->with('success', 'Image has been deleted!');
        }
        $validatedData = $request->validate([
            'value' => 'required',
            'content' => '',
            'image' => 'image|file|max:3072',
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('produk-image');
        }
        Variabel::updateOrCreate([
            'var' => 'produk_diagram'
        ], $validatedData);
        return back()->with('success', 'Data has been updated');
    }

    public function editTable()
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
        return view('cms.produk.produkIndividuTable', [
            'variabel' => $object
        ]);
    }

    public function saveTable(Request $request)
    {
        if ($request->image_destroy) {
            Storage::delete($request->oldImage);
            Variabel::updateOrCreate([
                'var' => 'produk_table'
            ], ['image' => null]);
            return redirect()->back()->with('success', 'Image has been deleted!');
        }
        $validatedData = $request->validate([
            'value' => 'required',
            'content' => '',
            'image' => 'image|file|max:3072',
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('produk-image');
        }
        Variabel::updateOrCreate([
            'var' => 'produk_table'
        ], $validatedData);
        return back()->with('success', 'Data has been updated');
    }

    public function editSyarat()
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
        return view('cms.produk.produkIndividuSyarat', [
            'variabel' => $object
        ]);
    }

    public function saveSyarat(Request $request)
    {
        if ($request->image_destroy) {
            Storage::delete($request->oldImage);
            Variabel::updateOrCreate([
                'var' => 'produk_syarat'
            ], ['image' => null]);
            return redirect()->back()->with('success', 'Image has been deleted!');
        }
        $validatedData = $request->validate([
            'value' => 'required',
            'content' => '',
            'image' => 'image|file|max:3072',
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('produk-image');
        }
        Variabel::updateOrCreate([
            'var' => 'produk_syarat'
        ], $validatedData);
        return back()->with('success', 'Data has been updated');
    }
}
