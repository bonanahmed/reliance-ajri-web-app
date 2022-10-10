<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\News;
use App\Models\Kategori;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        // dd(News::paginate(1));
        return view('cms.news.news', [
            'news' => News::orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function create(Request $request)
    {
        return view('cms.news.create', [
            'kategori' => Kategori::all()
        ]);
    }

    public function edit(Request $request, News $news)
    {
        return view('cms.news.update', [
            'news' => $news,
            'kategori' => Kategori::all()
        ]);
    }

    public function show(News $news)
    {
        return view('cms.news.show', [
            'news' => $news
        ]);
    }

    public function store(Request $request)
    {
        // return $request->file('image')->store('news-image');
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'body' => 'required',
            'kategori_id' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('news-image');
        }

        $validatedData['created_by'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        News::create($validatedData);
        return redirect('/c/news')->with('success', 'Data has been added');
    }

    public function update(Request $request, News $news)
    {
        $rules = [
            'title' => 'required',
            'body' => 'required',
            'kategori_id' => 'required',
            'image' => 'image|file|max:1024'
        ];

        if ($request->slug != $news->slug) {
            $rules['slug'] = 'required';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('news-image');
        }
        $validatedData['created_by'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        News::where('id', $news->id)
            ->update($validatedData);
        return redirect('/c/news')->with('success', 'Data has been updated');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::delete($news->image);
        }
        News::destroy($news->id);
        return redirect('/c/news')->with('success', 'News has been deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(News::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
