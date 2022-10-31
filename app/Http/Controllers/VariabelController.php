<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Variabel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class VariabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Variabel::query())
                ->addColumn('action', function ($variabel) {
                    // $action = '<a href="variabel/' . $variabel->id . '" class="badge bg-primary" style="margin-right: 4.5px;"><span data-feather="eye"></span></a>';
                    $action = '<a href="variabel/' . $variabel->id . '/edit" class="badge bg-success"><span data-feather="edit-2"></span></a>';
                    $action .= '<form action="/c/variabel/' . $variabel->id . '" class="d-inline" method="post">
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
        return view('cms.variabel.index', [
            'variabel' => Variabel::orderBy('id', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.variabel.create');
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
            'var' => 'required',
            'value' => '',
            'image' => 'image|file|max:1024',
            'content' => ''
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('var-image');
        }

        $validatedData['created_by'] = auth()->user()->id;
        Variabel::create($validatedData);
        return redirect('/c/variabel')->with('success', 'Data has been added!');
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
    public function edit(Variabel $variabel)
    {
        return view('cms.variabel.update', [
            'variabel' => $variabel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Variabel $variabel)
    {
        $validatedData = $request->validate([
            'var' => 'required',
            'value' => '',
            'image' => 'image|file|max:1024',
            'content' => ''
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('var-image');
        }

        $validatedData['created_by'] = auth()->user()->id;
        Variabel::where('id', $variabel->id)
            ->update($validatedData);
        return redirect('/c/variabel')->with('success', 'Data has been added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Variabel $variabel)
    {
        if ($variabel->image) {
            Storage::delete($variabel->image);
        }
        Variabel::destroy($variabel->id);
        return redirect('/c/variabel')->with('success', 'Variabel has been deleted');
    }
}
