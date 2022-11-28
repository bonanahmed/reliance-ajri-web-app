<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Brosur;
use App\Models\Brosur_kategori;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class BrosurController extends Controller
{
    public function getIndex()
    {
        return DataTables::of(Brosur::query())
            ->addColumn('action', function ($brosur) {
                $action = '<a href="brosur/' . $brosur->slug . '" class="badge bg-primary" style="margin-right: 4.5px;"><span data-feather="eye"></span></a>';
                $action .= '<a href="brosur/' . $brosur->slug . '" class="badge bg-success"><span data-feather="edit-2"></span></a>';
                $action .= '<form action="/c/brosur/' . $brosur->slug . '" class="d-inline" method="post">
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
            return DataTables::of(Brosur::query())
                ->addColumn('action', function ($brosur) {
                    $action = '<a href="brosur/' . $brosur->slug . '" class="badge bg-primary" style="margin-right: 4.5px;"><span data-feather="eye"></span></a>';
                    $action .= '<a href="brosur/' . $brosur->slug . '/edit" class="badge bg-success"><span data-feather="edit-2"></span></a>';
                    $action .= '<form action="/c/brosur/' . $brosur->slug . '" class="d-inline" method="post">
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
        return view('cms.brosur.index');
    }

    public function create(Request $request)
    {
        return view('cms.brosur.create', [
            'kategori' => Brosur_kategori::all()
        ]);
    }

    public function edit(Request $request, Brosur $brosur)
    {
        return view('cms.brosur.update', [
            'brosur' => $brosur,
            'kategori' => Brosur_kategori::all()
        ]);
    }

    public function show(Brosur $brosur)
    {
        return view('cms.brosur.show', [
            'brosur' => $brosur
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'image|file|max:1024',
            'kategori_id' => 'required',
            'alt' => '',
            'meta_keywords' => '',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('brosur-image');
        }

        $validatedData['created_by'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Brosur::create($validatedData);
        return redirect('/c/brosur')->with('success', 'Data has been added');
    }

    public function update(Request $request, Brosur $brosur)
    {
        $rules = [
            'title' => 'required',
            'body' => 'required',
            'image' => 'image|file|max:1024',
            'kategori_id' => 'required',
            'alt' => '',
            'meta_keywords' => '',
        ];

        if ($request->slug != $brosur->slug) {
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

        Brosur::where('id', $brosur->id)
            ->update($validatedData);
        return redirect('/c/brosur')->with('success', 'Data has been updated');
    }

    public function destroy(Brosur $brosur)
    {
        if ($brosur->image) {
            Storage::delete($brosur->image);
        }
        Brosur::destroy($brosur->id);
        return redirect('/c/brosur')->with('success', 'Brosur has been deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Brosur::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
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

    public function brosur(Request $request)
    {
        return view('web.pages.brosur', [
            'brosur' => Brosur::orderBy('id', 'desc')->paginate(12),
            'head_title' => $request->brosur_title->value ?? 'brosur_title',
            'head_sub_title' => $request->brosur_sub_title->value ?? 'brosur_sub_title',
            'btn_simulasi' => $request->btn_simulasi->value ?? 'btn_simulasi',
        ]);
    }

    public function brosurDetail(Brosur $brosur)
    {
        return view('web.pages.brosurDetail', [
            'brosur' => $brosur
        ]);
    }
}
