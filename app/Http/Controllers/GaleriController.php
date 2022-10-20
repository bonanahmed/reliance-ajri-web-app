<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Image;
use Illuminate\Http\Request;

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
            'title' => 'required'
        ]);

        $galeri = Galeri::create($validatedData);

        if ($request->file('image')) {
            $files = $request->file('image');
            $imageData = [];
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = uniqid() . '.' . $extension;
                $destinationPath = public_path() . '/storage/galeri';
                $imgurl = $file->store('galeri-image');
                // $imgurl = $file->move($destinationPath, $picture);
                array_push($imageData, [
                    'galeri_id' => $galeri->id,
                    'image' => $imgurl,
                    'created_at' => date("Y-m-d H:i:s")
                ]);
            }
            Image::insert($imageData);
            // $validatedData['image'] = $request->file('image')->store('news-image');
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
}
