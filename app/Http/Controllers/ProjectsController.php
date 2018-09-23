<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // this will prevent any access if user is not logged in
        $this->middleware('auth');
    }

    public function new() {
      // load the editor with no data
      return $this->load(null);
    }

    // save method is used to both create and update Projects
    // if the project_id is present, it will find that existing project and update it.
    // if the project_id does not exist (it is null), create a new project and save it
    public function save(Request $request, $project_id = null) {
      $this->validate($request, [
        'title' => 'required'
      ]);

      // store project
      if( $project_id === null ) {
        $project = new Project;
        // get project user id
        $project->user_id = auth()->user()->id;
      } else {
        $project = Project::find($project_id);
        // project user id does not change
      }

      $project->title = $request->input('title');
      $project->save();

      return redirect('/dashboard')->with('success', 'Project Saved');
    }

    public function load($id) {
      if( $id !== null ) {
        $project = Project::find($id);
      } else {
        // load the editor with no data
        $project = null;
      }
      return view('project.edit')->with('project', $project);
    }

    public function delete($project_id) {
      $project = Project::find($project_id);
      $project->delete();
      return redirect('/dashboard')->with('success', "Project '{$project->title}' Deleted");
    }
}
