<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Database\QueryException;
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

    public function preview(Formation $formation)
    {
        return view('admin.formation_preview', [
            'formation' => $formation
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.formation');
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
        return view('admin.formation_edit', [
            'formation' => $formation
        ]);
    }

    public function destroy(Formation $formation)
    {
        $formation->delete();

        return view('admin.formations', [
            'formations' => Formation::all()
        ]);
    }
}
