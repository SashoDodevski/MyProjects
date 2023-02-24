<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home () {
        $projects = Project::get();
        return view('index', compact('projects'));
    }

    public function signIn () {

        return view('signIn');
    }

    public function show(Project $project)
    {
        return view('show', compact('project'));
    }
    
}
