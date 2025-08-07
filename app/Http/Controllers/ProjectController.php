<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function showProjects()
    {
        $projects = Project::all();

        foreach ($projects as $project)
        {
            if($project->end < date('Y-m-d') && $project->status != 'Zavrseno') {
                $project->status = 'Zavrseno';
                $project->save();
            }

            if($project->start < date('Y-m-d') && $project->status == 'Nije pocelo') {
                $project->status = 'U toku';
                $project->save();
            }
        }

        return view('welcome', ['projects'=>$projects]);
    }

    public function show(Project $project)
    {
//        dd($project);
        return view('project-show', compact('project'));
    }


    public function add(Request $request)
    {
        /*
        dump($request->all());
        dd(gettype($request->get('start')));
        */
        $validate=$request->validate([
            'name'=>'required|string|max:64',
            'description'=>'required|string',
            'status'=>'not_in:0|required',
            'personName'=>'required|string|max:64',
            'start'=>'required|date',
            'end'=>'required|date'
        ]);

        Project::create($validate); //Upisujemo podatke u bazu

        return redirect()->route('project.page.add')->with('success', 'Uspesno ste dodali Vas projekat');
    }


    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.show')->with('success', "Uspjesno ste obrisali projekat: {$project->name}");
    }


    public function edit(Project $project)
    {
        return view('editProject', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name'=>'required|string|max:64',
            'description'=>'required|string',
            'status'=>'not_in:0|required',
            'personName'=>'required|string|max:64',
            'start'=>'required|date',
            'end'=>'required|date'
        ]);

        $project->name = $request->get('name');
        $project->description = $request->get('description');
        $project->status = $request->get('status');
        $project->personName = $request->get('personName');
        $project->start = $request->get('start');
        $project->end = $request->get('end');

        $project->save();

        return redirect()->route('projects.show')->with('success', "Uspijesno ste azurirali projekat: {$project->name}");
    }

}
