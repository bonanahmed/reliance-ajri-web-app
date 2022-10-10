<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Variabel;
use Illuminate\Support\Facades\Storage;

class VariabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.variabel.index', [
            'variabel' => Variabel::paginate(10)
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
            'image' => '',
            'content' => ''
        ]);

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
