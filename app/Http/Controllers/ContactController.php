<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Usernotnull\Toast\Concerns\WireToast;

class ContactController extends Controller
{

    use WireToast;

    public function index() {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'lastname' => 'required|string|min:3|max:255',
            'firstname' => 'required|string|min:3|max:255',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        return redirect()->route('index');
    }
}
