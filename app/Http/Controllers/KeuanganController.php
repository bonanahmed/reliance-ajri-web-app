<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Keuangan;
use App\Models\Keuangan_file;
use App\Models\Keuangan_link;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Keuangan::query())
                ->addColumn('action', function ($keuangan) {
                    $action = '<a href="keuangan/' . $keuangan->id . '/edit" class="badge bg-success"><span data-feather="edit-2"></span></a>';
                    $action .= '<form action="/c/keuangan/' . $keuangan->id . '" class="d-inline" method="post">
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
        return view('cms.keuangan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.keuangan.create');
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
            'body' => ''
        ]);
        $validatedData['created_by'] = auth()->user()->id;

        $keuangan = Keuangan::create($validatedData);

        if ($request->file('file')) {
            $files = $request->file('file');
            $filedata = [];
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $fileurl = $file->storeAs('keuangan-attachment', $filename);
                array_push($filedata, [
                    'keuangan_id' => $keuangan->id,
                    'file' => $fileurl,
                    'created_at' => date("Y-m-d H:i:s")
                ]);
            }
            Keuangan_file::insert($filedata);
        }

        /*
        if ($request->input('links')) {
            $links = $request->input('links');
            $link_names = $request->input('link_names');
            $linkdata = [];
            for ($index = 0; $index < count($links); $index++) {
                array_push($linkdata, [
                    'keuangan_id' => $keuangan->id,
                    'name' => $link_names[$index],
                    'link' => $links[$index],
                    'created_at' => date("Y-m-d H:i:s")
                ]);
            }
            Keuangan_link::insert($linkdata);
        }
        */

        return redirect('c/keuangan')->with('success', 'Data has been added!');
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
    public function edit(Keuangan $keuangan)
    {
        return view('cms.keuangan.update', compact('keuangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keuangan $keuangan)
    {
        if ($request->image_destroy) {
            Storage::delete($request->oldImage);
            Keuangan::where('id', $keuangan->id)
                ->update(['image' => null]);
            return redirect()->back()->with('success', 'Image has been deleted!');
        }


        $validatedData = $request->validate([
            'title' => 'required',
            'body' => ''
        ]);
        $validatedData['updated_by'] = auth()->user()->id;
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('keuangan-image');
        }

        Keuangan::where('id', $keuangan->id)
            ->update($validatedData);

        if ($request->file('file')) {
            $files = $request->file('file');
            $filedata = [];
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $fileurl = $file->storeAs('keuangan-attachment', $filename);
                array_push($filedata, [
                    'keuangan_id' => $keuangan->id,
                    'file' => $fileurl,
                    'created_at' => date("Y-m-d H:i:s")
                ]);
            }
            Keuangan_file::insert($filedata);
        }

        /*
        if ($request->input('links')) {
            $links = $request->input('links');
            $link_names = $request->input('link_names');
            $linkdata = [];
            for ($index = 0; $index < count($links); $index++) {
                array_push($linkdata, [
                    'keuangan_id' => $keuangan->id,
                    'name' => $link_names[$index],
                    'link' => $links[$index],
                    'created_at' => date("Y-m-d H:i:s")
                ]);
            }
            Keuangan_link::where('keuangan_id', $keuangan->id)->delete();
            Keuangan_link::insert($linkdata);
        }
        */

        return redirect('/c/keuangan')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keuangan $keuangan)
    {
        if ($keuangan->image) {
            Storage::delete($keuangan->image);
        }
        foreach ($keuangan->files as $file) {
            Storage::delete($file->file);
        }
        Keuangan::destroy($keuangan->id);

        /*
        Keuangan_link::where('keuangan_id', $keuangan->id)->delete();
        Keuangan_file::where('keuangan_id', $keuangan->id)->delete();
        */

        return redirect('/c/keuangan')->with('success', $keuangan->title . ' has been deleted');
    }

    public function fileDestroy(Keuangan_file $file)
    {
        if ($file->file) {
            Storage::delete($file->file);
        }
        Keuangan_file::destroy($file->id);
        return back()->with('success', 'Attachment has been deleted');
    }

    public function keuangan()
    {
        $keuangan = Keuangan::all();
        $about = About::all();
        return view('web.pages.keuangan', compact('keuangan', 'about'));
    }
}
