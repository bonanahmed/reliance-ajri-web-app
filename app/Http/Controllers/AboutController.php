<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\File;
use App\Models\Variabel;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.about.index', [
            'about' => About::orderBy('id', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.about.create');
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
            'image' => 'image|file|max:1024',
            'body' => 'required',
            'file' => 'file|max:2024',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('about-image');
        }



        $validatedData['created_by'] = auth()->user()->id;
        $about = About::create($validatedData);

        if ($request->file('file')) {
            $files = $request->file('file');
            $filedata = [];
            foreach ($files as $file) {
                $fileurl = $file->store('attachment');
                array_push($filedata, [
                    'about_id' => $about->id,
                    'file' => $fileurl,
                    'created_at' => date("Y-m-d H:i:s")
                ]);
            }
            File::insert($filedata);
        }
        return redirect('/c/about')->with('success', 'Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        return view('cms.about.show', [
            'about' => $about
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        return view('cms.about.update', [
            'about' => $about
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $rules = [
            'title' => 'required',
            'body' => 'required',
            'image' => 'image|file|max:1024',
        ];

        if ($request->slug != $about->slug) {
            $rules['slug'] = 'required';
        }

        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('news-image');
        }

        About::where('id', $about->id)
            ->update($validatedData);

        if ($request->file('file')) {
            $files = $request->file('file');
            $filedata = [];
            foreach ($files as $file) {
                $fileurl = $file->storeAs(
                    'attachment',
                    $file->getClientOriginalName()
                );
                array_push($filedata, [
                    'about_id' => $about->id,
                    'file' => $fileurl,
                    'filename' => $file->getClientOriginalName(),
                    'created_at' => date("Y-m-d H:i:s")
                ]);
            }
            File::insert($filedata);
        }
        return redirect('/c/about')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        if ($about->image) {
            Storage::delete($about->image);
        }
        About::destroy($about->id);
        return redirect('/c/about')->with('success', $about->title . ' has been deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(About::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    // For Web

    public function aboutus(About $about)
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
        return view('web.pages.about', [
            'variabel' => $object,
            'list' => About::all(),
            'about' => $about
        ]);
    }

    public function fileDestroy(File $file)
    {
        if ($file->file) {
            Storage::delete($file->file);
        }
        File::destroy($file->id);
        return back()->with('success', 'Attachment has been deleted');
    }
}
