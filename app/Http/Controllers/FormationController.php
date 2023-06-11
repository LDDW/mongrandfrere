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

        // send email test 
        Mail::to(auth()->user())->send(new OrderMail());
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

    public function store(Request $request) {
        $request->validate([
            'title' => 'required_if:status,published|string|min:3',
            'description' => 'required_if:status,published|string|min:10',
            'price' => 'required_if:status,published|numeric|min:0',
            'img' => 'required_if:status,published|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $backtrace = debug_backtrace()[0];

        try {
            // image upload 
            if(isset($request->img)){
                $image = $request->file('img');
                $filename = $image->hashName();
                $image->move(public_path('storage/images/articles'), $filename);
            }

            Formation::create([
                'title' => $request->title,
                'desc' => $request->description,
                'price' => $request->price,
                'img' => isset($filename) ? $filename : '',
                'status' => $request->status,
            ]);

            // toast success for ui
            toast()
                ->success('La formation a bien été créé !', 'Création réussite')
                ->pushOnNextPage();

            // log success
            Log::info("La formation a bien été créé", [
                'class' => $backtrace['class'],
                'function' => $backtrace['function'],
            ]);

        } catch (QueryException $qe) {
            // toast error for ui
            toast()
                ->danger('La formation n\'a pas pu être créé !', 'Création échouée')
                ->pushOnNextPage();
            
            // log error
            Log::error("La formation n'a pas pu être créé", [
                'class' => $backtrace['class'],
                'function' => $backtrace['function'],
                'error' => $qe->getMessage(),
            ]);
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

    public function update(Request $request, Formation $formation)
    {
        $request->validate([
            'title' => 'required_if:status,published|string|min:3',
            'content' => 'required_if:status,published|string|min:10',
            'price' => 'required_if:status,published|numeric|min:0',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $backtrace = debug_backtrace()[0];

        try {
            // image upload 
            if(isset($request->img)){
                $image = $request->file('img');
                $filename = $image->hashName();
                $image->move(public_path('storage/images/articles'), $filename);
            }

            $formation->update([
                'title' => $request->title,
                'desc' => $request->content,
                'price' => $request->price,
                'img_name' => isset($filename) ? $filename : $formation->img,
                'status' => $request->status,
            ]);

            // toast success for ui
            toast()
                ->success('La formation a bien été modifié !', 'Modification réussite')
                ->pushOnNextPage();

            // log success
            Log::info("La formation a bien été modifié", [
                'class' => $backtrace['class'],
                'function' => $backtrace['function'],
            ]);

        } catch (QueryException $qe) {
            // toast error for ui
            toast()
                ->danger('La formation n\'a pas pu être modifié !', 'Modification échouée')
                ->pushOnNextPage();
            
            // log error
            Log::error("La formation n'a pas pu être modifié", [
                'class' => $backtrace['class'],
                'function' => $backtrace['function'],
                'error' => $qe->getMessage(),
            ]);
        }

        return redirect()->route('admin.formations');
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
