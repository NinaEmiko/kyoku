<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request\UploadRequest;

class UploadController extends Controller
{
    public function uploadForm() {
        return view('pages.uploadForm');
    }

    public function uploadSubmit(Request $request) {

        $project = Project::create($request->all());
        foreach ($request->tracks as $track)
            $filename = $track->store('tracks');
            Projectstrack::create([
                'project_id' => $project->id,
                'filename' => $filename
            ]);
        }
        // return 'Upload successful!';
}
