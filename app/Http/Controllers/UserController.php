<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'users' => User::where('role', 'admin')->orderBy('id', 'desc')->paginate('10')
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
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
        $rules = [
            'name' => 'required',
            'email' => 'required',
        ];


        if ($request->password) {
            $rules['password'] = 'required|confirmed|min:6';
        }

        $validatedData = $request->validate($rules);
        if ($request->password) {
            $validatedData['password'] = Hash::make($request->password);
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
        User::where('id', $user->id)
            ->where('role', '!=', 'super')->delete();
        return redirect('/c/user')->with('success', $user->email . ' has been deleted');
    }

    public function profile()
    {
        return view('cms.user.profile', [
            'user' => User::find(auth()->user()->id)
        ]);
    }

    public function updateProfile(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'name' => 'required',
        ]);

        User::where('id', auth()->user()->id)->update($validatedData);
        return back()->with('success', 'Password has been updated');
    }

    public function changePassword()
    {
        return view('cms.password.update');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:6'
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with('error', 'Old password invalid');
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('success', 'Password has been updated');
    }
}
