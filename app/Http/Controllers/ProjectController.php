<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = $this->getProjects();

        return view('projects', compact('projects'));
    }

    public function project(Request $request, $id)
    {
        $project = null;
        foreach ($this->getProjects() as $item) {
            if ($item->id == $id) {
                $project = $item;
                break;
            };
        }

        return view('project', compact('project'));
    }


    protected function getProjects()
    {
        return json_decode(file_get_contents(storage_path('app/data/products.json')));
    }
}
