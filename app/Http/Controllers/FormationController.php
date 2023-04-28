<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('formations', [
            'formations' => Formation::all()
        ]);
    }

    public function admin()
    {
        return view('admin.formations', [
            'formations' => Formation::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Formation $formation)
    {
        // verify that the formation is published
        if (!$formation->published) {
            abort(404);
        }

        return view('formations.show', [
            'formation' => $formation,
            'randomFormation' => Formation::inRandomOrder()->take(3)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formation $formation)
    {
        //
    }
}
