<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
//use App\Http\Controllers\ProjectController;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('dashboard')->with('projects', $projects);;
    }
}
