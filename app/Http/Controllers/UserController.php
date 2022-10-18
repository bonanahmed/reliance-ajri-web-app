<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.user.index', [
            'users' => User::where('role', 'admin')->paginate('10')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.user.create');
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
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $validatedData['role'] = 'admin';
        User::create($validatedData);
        return redirect('c/user')->with('success', $request->email . ' has been created');
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
    public function edit(User $user)
    {
        return view('cms.user.update', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        if ($request->password) {
            $validatedData['password'] = $request->password;
        }
        User::where('id', $user->id)->update($validatedData);
        return redirect('/c/user')->with('success', $user->email . ' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/c/user')->with('success', $user->email . ' has been deleted');
    }

    public function profile(User $user)
    {
        return view('cms.user.profile', [
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request, User $user)
    {
        $rules = [
            'email' => 'required|email',
            'name' => 'required'
        ];

        $validatedData = $request->validate($rules);

        if ($request->password) {
            $validatedData['password'] = $request->password;
        }

        User::where('id', $user->id)->update($validatedData);
        return redirect('/c/user/profile')->with('success', 'Data has been updated');
    }
}
