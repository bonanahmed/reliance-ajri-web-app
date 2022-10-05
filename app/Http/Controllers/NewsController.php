<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        return view('cms.news.news', [
            'news' => News::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'body' => 'required'
        ]);

        $validatedData['created_by'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        News::create($validatedData);
        return redirect('/c/news')->with('success', 'Data has been added');
    }

    public function update(Request $request)
    {
    }

    public function destroy(Request $request)
    {
    }

    public function create(Request $request)
    {
        return view('cms.news.create');
    }
}
