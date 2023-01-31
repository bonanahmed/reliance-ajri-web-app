<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Banner::query())
                ->addColumn('action', function ($banner) {
                    $action = '<a href="banner/' . $banner->id . '/edit" class="badge bg-success"><span data-feather="edit-2"></span></a>';
                    $action .= '<form action="/c/banner/' . $banner->id . '" class="d-inline" method="post">
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
        return view('cms.banner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.banner.create');
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
            'image' => 'image|file|max:3072',
            'alt' => '',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('banner-image');
        }

        $validatedData['created_by'] = auth()->user()->id;
        Banner::create($validatedData);
        return redirect('/c/banner')->with('success', 'Data has been Added');
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
    public function edit(Banner $banner)
    {
        return view('cms.banner.update', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        if ($request->image_destroy) {
            Storage::delete($request->oldImage);
            Banner::where('id', $banner->id)
                ->update(['image' => null]);
            return redirect()->back()->with('success', 'Image has been deleted!');
        }
        $rules = [
            'name' => 'required',
            'image' => 'image|file|max:3072',
            'alt' => '',
        ];


        $validatedData = $request->validate($rules);



        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('banner-image');
        }
        $validatedData['updated_by'] = auth()->user()->id;

        Banner::where('id', $banner->id)
            ->update($validatedData);
        return redirect('/c/banner')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        if ($banner->image) {
            Storage::delete($banner->image);
        }
        Banner::destroy($banner->id);
        return redirect('/c/banner')->with('success', 'Banner has been deleted');
    }
}
