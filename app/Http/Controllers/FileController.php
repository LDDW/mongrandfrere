<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function download(File $file)
    {
        // verify is user has paid for the formation
        if (! $file->formation->order->where('user_id', auth()->user()->id)->first()) {
            abort(403);
        }

        // verify file path
        if (! file_exists(storage_path('app/formations/'.$file->formation->id.'/'.$file->file_name))) {
            abort(404);
        }

        return response()->download(storage_path('app/formations/'.$file->formation->id.'/'.$file->file_name));
    }

    // public function CustomerProjectFile(Customer $customer_id, Project $project_id, ProjectFile $file_id)
    // {
    //     // verify if user is the owner of the customer
    //     Auth::user()->id === $customer_id->user_id || Auth::user()->role[0]->name === 'admin' ? $customer_id->id : abort(403);

    //     // verify file path
    //     if (! file_exists(storage_path('app/private/customer/'.$customer_id->id.'/project/'.$project_id->id.'/'.$file_id->name))) {
    //         abort(404);
    //     }

    //     return response()->file(storage_path('app/private/customer/'.$customer_id->id.'/project/'.$project_id->id.'/'.$file_id->name));
    // }
}
