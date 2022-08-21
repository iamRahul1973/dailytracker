<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Trackersheet extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('trackersheet', ['projects' => self::getProjects()]);
    }

    private function getProjects()
    {
        if (Auth::user()->hasRole('project manager')) {
            return Project::where('manager_id', auth()->user()->id)->get();
        }

        return Project::all();
    }
}
