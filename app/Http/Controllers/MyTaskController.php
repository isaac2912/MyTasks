<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyTaskController extends Controller
{
    function test_base()
    {
        return view('layouts.master');
    }

    function project_dashboard()
    {
        $total_tasks = Tasks::where('category', 'Task')->get()->count();
        $total_projects = Tasks::where('category', 'Project')->get()->count();
        $total_goals = Tasks::where('category', 'Goal')->get()->count();

        $users = User::orderBy('my_points', 'desc')->get();
        // $projects = Tasks::where('category', 'Project')->get()->groupBy('userId');

        // $projects = User::join('tasks', 'tasks.userId', '=', 'users.id')->where('tasks.category', 'Project')
        //     ->select('users.*')
        //     ->get()->groupBy('tasks.userId');

        $projects = DB::table('tasks')
            ->select('userId', DB::raw('count(*) as total'))
            ->where('category', 'Project')
            ->groupBy('userId')
            ->orderby('total','desc')
            ->get();

        // dd($projects);
        return view('project-dashboad')->with(['total_tasks' => $total_tasks, 'total_projects' => $total_projects, 'total_goals' => $total_goals, 'users' => $users, 'projects' => $projects]);
    }

    function create_project(Request $request)
    {
        dump($request->all());
        return view('projects.create-project');
    }
    function add_tasks()
    {
        $tasks = Tasks::where('category', 'Task')->get();
        return view('tasks')->with(['tasks' => $tasks]);
    }
    function add_projects()
    {
        $projects = Tasks::where('category', 'Project')->get();
        return view('projects')->with(['projects' => $projects]);
    }
    function add_goals()
    {
        $goals = Tasks::where('category', 'Goal')->get();
        return view('goals')->with(['goals' => $goals]);
    }
    function insert_tasks(Request $request)
    {
        $task = new Tasks();
        $title = $request->input('title');
        // $points = $request->input('points');
        $category = $request->input('category');

        if ($category == 'Project') {
            $points = 50;
        } elseif ($category == 'Task') {
            $points = 20;
        } elseif ($category == 'Goal') {
            $points = 10;
        }
        // dd($address);
        $userId = $request->input('userId');
        // $userId = Auth::user()->id;
        // dd($userId);
        $task->insertTaskRecord($title, $points, $category, $userId);

        $route = 'view_all_' . strtolower($category) . 's';
        return redirect()->route($route)->with('message', $category . ' added successfully');
    }
    public function view_task($id)
    {
        $task = Tasks::findOrFail($id);

        return view('view_task', array('task' => $task));
    }
    public function edit_task($id)
    {
        $task = Tasks::findOrFail($id);

        return view('edit_task', array('task' => $task));
    }

    public function update_task(Request $request, $id)
    {
        $task = Tasks::findOrFail($id);

        $input = $request->all();

        $task->fill($input)->save();

        $route = 'view_all_' . strtolower($task->category) . 's';
        return redirect()->route($route)->with('message', 'Successfully update the record');
    }

    public function delete_task($id)
    {
        $task = Tasks::findOrFail($id);

        $task->delete();
        $route = 'view_all_' . strtolower($task->category) . 's';

        return redirect()->route($route)->with('message', 'Successfully delete the record');
    }
    public function mark_as_completed_task($id)
    {
        $user = User::findOrFail(Auth::user()->id);
        $task = Tasks::findOrFail($id);
        $task->status = 'Completed';
        $task->update();
        $user->my_points = $user->my_points + $task->points;
        // $user->my_points = $task->points;
        $user->update();
        $route = 'view_all_' . strtolower($task->category) . 's';
        return redirect()->route($route)->with('message', 'Mark as completed successfully');
    }

    function my_points()
    {
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        return view('my_points')->with(['user' => $user]);
    }
}
