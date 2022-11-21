<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mitra;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Mitra::query())
                ->addColumn('action', function ($mitra) {
                    $action = '<a href="mitra/' . $mitra->id . '/edit" class="badge bg-success"><span data-feather="edit-2"></span></a>';
                    $action .= '<form action="/c/mitra/' . $mitra->id . '" class="d-inline" method="post">
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
        return view('cms.mitra.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.mitra.create');
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
            'name' => 'required',
            'type' => 'required',
            'image' => 'required',
            'description' => 'required',
            'tanggal_kerjasama' => ''
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('mitra-image');
        }

        $validatedData['created_by'] = auth()->user()->id;
        Mitra::create($validatedData);
        return redirect('/c/mitra')->with('success', 'Data has been Added');
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
    public function edit(Mitra $mitra)
    {
        return view('cms.mitra.update', [
            'mitra' => $mitra
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mitra $mitra)
    {
        $rules = [
            'name' => 'required',
            'description' => '',
            'type' => 'required',
            'image' => 'image|file|max:1024',
            'tanggal_kerjasama' => ''
        ];

        // if ($request->slug != $mitra->slug) {
        //     $rules['slug'] = 'required';
        // }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('mitra-image');
        }

        Mitra::where('id', $mitra->id)
            ->update($validatedData);
        return redirect('/c/mitra')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mitra $mitra)
    {
        if ($mitra->image) {
            Storage::delete($mitra->image);
        }
        Mitra::destroy($mitra->id);
        return redirect('/c/mitra')->with('success', 'Mitra has been deleted');
    }

    public function klien(Request $request)
    {
        $variabel = $request->variabel;
        return view('web.pages.klien', [
            'head_title' => $variabel->mitra_title->value ?? 'mitra_title',
            'head_sub_title' => $variabel->mitra_sub_title->value ?? 'mitra_sub_title',
            'btn_simulasi' => $variabel->btn_simulasi->value ?? 'btn_simulasi',
            'mitra' => Mitra::where('type', 'client')->paginate(10),
            'count' => Mitra::where('type', 'client')->count()
        ]);
    }

    public function rekanan(Request $request)
    {
        $variabel = $request->variabel;
        return view('web.pages.rekanan', [
            'head_title' => $variabel->mitra_title->value ?? 'mitra_title',
            'head_sub_title' => $variabel->mitra_sub_title->value ?? 'mitra_sub_title',
            'btn_simulasi' => $variabel->btn_simulasi->value ?? 'btn_simulasi',
            'mitra' => Mitra::where('type', 'rekanan')->paginate(10),
            'count' => Mitra::where('type', 'rekanan')->count()
        ]);
    }
}
