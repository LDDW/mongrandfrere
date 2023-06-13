<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Formation;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Usernotnull\Toast\Concerns\WireToast;

class FormationController extends Controller
{
    use WireToast;

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

    public function publish(Formation $formation){
        $backtrace = debug_backtrace()[0];
        
        try {
            Formation::where('id', $formation->id)->update([
                'status' => 'published'
            ]);

            // toast success for ui
            toast()
                ->success('La formation a bien été publiée !', 'Publication réussie')
                ->pushOnNextPage();
            
            // log success
            Log::info('Formation published', [
                'class' => $backtrace['class'],
                'function' => $backtrace['function'],
            ]);

        } catch (QueryException $qe) {
            // toast error for ui
            toast()
                ->danger('La formation n\'a pas pu être publiée !', 'Publication échouée')
                ->pushOnNextPage();
            
            // log error
            Log::error('Formation not published', [
                'class' => $backtrace['class'],
                'function' => $backtrace['function'],
                'error' => $qe->getMessage(),
            ]);
        }

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
        if ($formation->status !== 'published') {
            abort(404);
        }

        return view('formation', [
            'formation' => $formation,
            'randomFormation' => Formation::inRandomOrder()->take(3)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formation $formation)
    {
        return view('admin.formation', [
            'formation' => $formation,
        ]);
    }

    public function destroy(Formation $formation)
    {
        $backtrace = debug_backtrace()[0];

        try {
            Formation::destroy($formation->id);

            // toast message for ui
            toast()
                ->success('La formation a bien été supprimé !', 'Suppression réussite')
                ->pushOnNextPage();
            
            // log success
            Log::info('Formation supprimée avec succès !', [
                'class' => $backtrace['class'],
                'function' => $backtrace['function'],
            ]);

        } catch (QueryException $qe) {
            // toast message for ui
            toast()
                ->danger('La formation n\'a pas été supprimé !', 'Erreur')
                ->pushOnNextPage();

            // log error
            Log::error('Erreur avec la suppression de la formation', [
                'class' => $backtrace['class'],
                'function' => $backtrace['function'],
                'error' => $qe->getMessage(),
            ]);
        }

        return redirect()->route('admin.formations');
    }
}
