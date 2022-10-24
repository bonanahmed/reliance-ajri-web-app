<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.slider.index', [
            'slider' => Slider::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = Slider::count();
        if ($count >= 9) {
            return redirect('/c/slider')->with('error', 'Data has reached the maximum limit');
        }
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|file|max:1024',
            'button' => '',
            'button_link' => ''
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('slider-image');
        }
        $validatedData['created_by'] = auth()->user()->id;

        Slider::create($validatedData);
        return redirect('/c/slider')->with('success', 'Data has been added');
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
    public function edit(Slider $slider)
    {
        return view('cms.slider.update', [
            'slider' => $slider
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|file|max:1024',
            'button' => '',
            'button_link' => ''
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('slider-image');
        }

        Slider::where('id', $slider->id)
            ->update($validatedData);
        return redirect('/c/slider')->with('success', 'Data has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if ($slider->image) {
            Storage::delete($slider->image);
        }
        Slider::destroy($slider->id);
        return redirect('/c/slider')->with('success', 'Data has been deleted');
    }
}
