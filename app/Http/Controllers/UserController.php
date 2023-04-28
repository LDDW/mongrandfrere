<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('admin.users', [
            'users' => User::all()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.user', [
            'user' => User::where('id', $user->id)->with('order')->firstOrFail(), 
        ]);
    }
}
