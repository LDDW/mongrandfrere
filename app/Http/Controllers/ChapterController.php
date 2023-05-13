<?php
namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Formation;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChapterController extends Controller
{
    public function create(Formation $formation)
    {
        return view('admin.chapter', [
            'formation' => $formation
        ]);
    }

    public function store (Request $request, Formation $formation)
    {   
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'files.*.name' => 'required_if:files.*.file,required',
            'files.*.file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar,7z',
        ]);

        $files = [];

        foreach ($request->file('files') as $i => $file) {
            $filename = $file['file']->hashName();
            $file['file']->storeAs('public/files', $filename);
            $files[] = [
                'hashName' => $file['file']->hashName(),
                'name' => $file['file']->getClientOriginalName(),
            ];
        }

        $backtrace = debug_backtrace()[0];

        try {
            
            Chapter::create([
                'title' => ucfirst($request->title),
                'content' => $request->content,
                'formation_id' => $formation->id,
                'files' => json_encode($files),    
            ]);

            // toast success for ui
            toast()
                ->success('Le chapitre a bien été créé !', 'Création réussie')
                ->pushOnNextPage();
            
            // log success
            Log::info('Chapter created', [
                'file' => $backtrace['file'],
                'line' => $backtrace['line'],
            ]);

        } catch (QueryException $qe) {
            // toast error for ui
            toast()
                ->error('Le chapitre n\'a pas pu être créé !', 'Création échouée')
                ->pushOnNextPage();

            // log error
            Log::error('Error with chapter creation', [
                'file' => $backtrace['file'],
                'line' => $backtrace['line'],
                'error' => $qe,
            ]);
        }

        return redirect()->route('admin.formation.edit', $formation);
    }

    public function edit(Formation $formation)
    {
        return view('admin.formation', [
            'formation' => $formation
        ]);
    }

    public function update(Request $request, Formation $formation, Chapter $chapter)
    {
        $request->validate([

        ]);

        return redirect()->route('admin.formation.edit', $formation);
    }
}
