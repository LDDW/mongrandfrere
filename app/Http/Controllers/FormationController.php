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

    public function store(Request $request) {
        $request->validate([
            'title' => 'required_if:status,published|string|min:3',
            'description' => 'required_if:status,published|string|min:10',
            'price' => 'required_if:status,published|numeric|min:0',
            'img' => 'required_if:status,published|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        // image upload 
        if(isset($request->img)){
            $image = $request->file('img');
            $filename = $image->hashName();
            $image->move(public_path('storage/images/articles'), $filename);
        }

        try {
            Formation::create([
                'title' => $request->title,
                'desc' => $request->description,
                'price' => $request->price,
                'img' => isset($filename) ? $filename : '',
                'status' => $request->status,
            ]);

            // toast message
            toast()
                ->success('Formation ajoutée avec succès !', 'Ajouté')
                ->pushOnNextPage();

        } catch (QueryException $qe) {
            dd($qe->getMessage());
        }

        return view('admin.formations', [
            'formations' => Formation::all()
        ]);
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
            'formation' => $formation,
            'chapters' => Formation::find($formation->id)->chapter()->get()
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
