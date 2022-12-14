<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function add_project_form(){

            return view('projects.create');
    }

    public function submit_project_data(Request $request){
        Project::create([
            'project_name' => $request->project_name,
            'project_cate' => $request->project_cate,
            'project_doc' => $request->project_doc,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'budget' => $request->budget,
            'priority' => $request->priority,
            'description' => $request->description,
        ]);
//        $this->message('message','Project created successfully!');
        return redirect()->back();
    }

    public function fetch_all_projects(Request $request){
        $projects = Project::toBase()->get();
        return view('projects.all_projects',compact('projects'));
    }

}
