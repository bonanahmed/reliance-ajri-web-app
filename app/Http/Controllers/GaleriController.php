<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.galeri.index', [
            'galeri' => Galeri::paginate(10)
        ]);
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
            'description' => ''
        ]);

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
            'description' => ''
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
        return redirect("/c/galeri/$galeri->id/edit")->with('success', 'Data has been updated');
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
        return redirect("/c/galeri/$image->galeri_id/edit")->with('success', 'Image has been deleted');
    }
}
