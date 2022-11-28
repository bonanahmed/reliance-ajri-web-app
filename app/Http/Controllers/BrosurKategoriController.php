<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brosur_kategori;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class BrosurKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Brosur_kategori::query())
                ->addColumn('action', function ($kategori) {
                    $action = '<a href="category_brosur/' . $kategori->id . '/edit" class="badge bg-success"><span data-feather="edit-2"></span></a>';
                    $action .= '<form action="/c/category_brosur/' . $kategori->id . '" class="d-inline" method="post">
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
        return view('cms.kategori_brosur.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.kategori_brosur.create');
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

        $validatedData['created_by'] = auth()->user()->id;
        Brosur_kategori::create($validatedData);
        return redirect('/c/category_brosur')->with('success', 'Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brosur_kategori $category_brosur)
    {
        return view('cms.kategori_brosur.show', [
            'kategori' => $category_brosur
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brosur_kategori $category_brosur)
    {
        return view('cms.kategori_brosur.update', [
            'kategori' => $category_brosur
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brosur_kategori $category_brosur)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => ''
        ]);

        Brosur_kategori::where('id', $category_brosur->id)
            ->update($validatedData);

        return redirect('c/category_brosur')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brosur_kategori $category_brosur)
    {
        Brosur_kategori::destroy($category_brosur->id);
        return redirect('/c/category_brosur')->with('success', $category_brosur->title . ' has been deleted!');
    }
}
