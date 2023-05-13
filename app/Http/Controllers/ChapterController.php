<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Formation;
use Illuminate\Http\Request;

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

        ]);

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
