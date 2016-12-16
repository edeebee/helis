<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Hash;
use Validator;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));
    }

    /**
     * Store a newly created password.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function change(Request $request)
    {
        $user = Auth::user();

        $validation = Validator::make($request->all(), [

            // Here's how our new validation rule is used.
            'current_password' => 'hash:' . $user->password,
            'password' => 'required|confirmed'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors());
        }

        $user->password = Hash::make($request->get('password'));
        $user->save();

        return redirect()->to('/profile')->with('success', 'Password updated!');
    }

}
