<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Alert;

class ProfileController extends Controller
{
    public function edit() {
        Alert::success('Profile Berhasi di Update','Sukses'); 
        return view('profile.edit')->with('user', auth()->user());
    }

    public function update(Request $request) {
        Alert::success('Profile Berhasi di Update','Sukses'); 
        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);
        return redirect()->route('indexadmin');
    }
}
