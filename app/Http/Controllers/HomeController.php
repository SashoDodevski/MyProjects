<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home () {
        $projects = Project::get();
        $user = Auth::user();
        return view('index', compact(['projects', 'user']));
    }

    public function signIn () {

        return view('signIn');
    }

    public function show(Project $project)
    {
        return view('show', compact('project'));
    }
    
}
