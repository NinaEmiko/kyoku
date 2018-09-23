<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Project;
use App\Projectstrack;

class UploadController extends Controller
{
    public function __construct() {
        // this will prevent any access if user is not logged in
        $this->middleware('auth');
    }

    public function uploadForm() {
        return view('pages.uploadForm');
    }

    public function uploadSubmit(Request $request) {

        $projectData = $request->all();
        $projectData['user_id'] = auth()->user()->id;

        $project = Project::create($projectData);

        if( is_array($request->tracks) ) {
          $tracks = $request->tracks;
        } else {
          $tracks = [$request->tracks];
        }

        foreach( $tracks as $track ) {
            $filename = $track->store('tracks');
            Projectstrack::create([
                'project_id' => $project->id,
                'filename' => $filename
            ]);
        }
        return 'Upload successful!';
      }
}
