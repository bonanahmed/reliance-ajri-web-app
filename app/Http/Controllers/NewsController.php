<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\News;
use App\Models\Kategori;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class NewsController extends Controller
{
    public function getIndex()
    {
        return DataTables::of(News::query())
            ->addColumn('action', function ($news) {
                $action = '<a href="news/' . $news->slug . '" class="badge bg-primary" style="margin-right: 4.5px;"><span data-feather="eye"></span></a>';
                $action .= '<a href="news/' . $news->slug . '" class="badge bg-success"><span data-feather="edit-2"></span></a>';
                $action .= '<form action="/c/news/' . $news->slug . '" class="d-inline" method="post">
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
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(News::query())
                ->addColumn('action', function ($news) {
                    $action = '<a href="news/' . $news->slug . '" class="badge bg-primary" style="margin-right: 4.5px;"><span data-feather="eye"></span></a>';
                    $action .= '<a href="news/' . $news->slug . '/edit" class="badge bg-success"><span data-feather="edit-2"></span></a>';
                    $action .= '<form action="/c/news/' . $news->slug . '" class="d-inline" method="post">
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
        return view('cms.news.index');
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
            'image' => 'image|file|max:1024',
            'alt' => '',
            'meta_keywords' => '',
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
            'image' => 'image|file|max:1024',
            'alt' => '',
            'meta_keywords' => '',
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

    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            //get filename with extension
            $filenamewithextension = $request->file('file')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('file')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('file')->storeAs('uploads', $filenametostore);
            // $request->file('image')->store('trix-image');

            // you can save image path below in database
            $path = asset('storage/uploads/' . $filenametostore);

            echo $path;
            exit;
        }
    }

    public function news(Request $request)
    {
        return view('web.pages.news', [
            'news' => News::orderBy('id', 'desc')->paginate(12),
            'head_title' => $request->news_title->value ?? 'news_title',
            'head_sub_title' => $request->news_sub_title->value ?? 'news_sub_title',
            'btn_simulasi' => $request->btn_simulasi->value ?? 'btn_simulasi',
        ]);
    }

    public function newsDetail(News $news)
    {
        return view('web.pages.newsDetail', [
            'news' => $news
        ]);
    }
}
