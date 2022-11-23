<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Yajra\DataTables\Facades\DataTables;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Galeri::query())
                ->addColumn('action', function ($galeri) {
                    $action = '<a href="galeri/' . $galeri->slug . '/edit" class="badge bg-success"><span data-feather="edit-2"></span></a>';
                    $action .= '<form action="/c/galeri/' . $galeri->slug . '" class="d-inline" method="post">
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
        return view('cms.galeri.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.galeri.create');
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
            'description' => '',
            'slug' => 'required',
            'meta_keywords' => '',
        ]);
        $validatedData['created_by'] = auth()->user()->id;
        $galeri = Galeri::create($validatedData);

        if ($request->file('image')) {
            $files = $request->file('image');
            $imageData = [];
            foreach ($files as $file) {
                $imgurl = $file->store('galeri-image');
                array_push($imageData, [
                    'galeri_id' => $galeri->id,
                    'image' => $imgurl,
                    'created_at' => date("Y-m-d H:i:s")
                ]);
            }
            Image::insert($imageData);
        }

        return redirect('/c/galeri')->with('success', 'Image has been saved');
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
    public function edit(Galeri $galeri)
    {
        return view('cms.galeri.update', [
            'galeri' => $galeri
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galeri $galeri)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => '',
            'meta_keywords' => '',
        ]);

        if ($request->file('image')) {
            $files = $request->file('image');
            $imageData = [];
            foreach ($files as $file) {
                $imgurl = $file->store('galeri-image');
                array_push($imageData, [
                    'galeri_id' => $galeri->id,
                    'image' => $imgurl,
                    'created_at' => date("Y-m-d H:i:s")
                ]);
            }
            Image::insert($imageData);
        }


        Galeri::where('id', $galeri->id)
            ->update($validatedData);
        return redirect("/c/galeri/$galeri->slug/edit")->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeri $galeri)
    {
        if ($galeri->images) {
            foreach (json_decode($galeri->images) as $item) {
                Storage::delete($item->image);
            }
        }
        Image::where('galeri_id', $galeri->id)->delete();
        Galeri::destroy($galeri->id);
        return redirect('/c/galeri')->with('success', 'Data has been deleted');
    }

    public function imageDestroy(Image $image)
    {
        if ($image->image) {
            Storage::delete($image->image);
        }
        Image::destroy($image->id);
        return back()->with('success', 'Image has been deleted');
    }

    public function galeri(Request $request)
    {
        $variabel = $request->variabel;
        return view('web.pages.galeri', [
            'title' => 'Galeri',
            'head_title' => $variabel->galeri_title->value ?? 'galeri_title',
            'head_sub_title' => $variabel->galeri_sub_title->value ?? 'galeri_sub_title',
            'galeri' => Galeri::orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function galeriDetail(Request $request, Galeri $galeri)
    {
        $variabel = $request->variabel;
        return view('web.pages.galeriDetail', [
            'title' => 'Galeri',
            'head_title' => $variabel->galeri_title->value ?? 'galeri_title',
            'head_sub_title' => $variabel->galeri_sub_title->value ?? 'galeri_sub_title',
            'galeri' => $galeri
        ]);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Galeri::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
