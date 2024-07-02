<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Models\Task;
use App\Models\User;
use App\Models\Worker;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'costumer_id' => 'required',
            'worker_id' => 'required',
            'description' => 'required',
            'type' => 'required',
            'status' => 'required',
            'coordinate' => 'required_without'
        ]);

        try {
            Task::create([
                'costumer_id' => request()->input('costumer_id'),
                'worker_id' => request()->input('worker_id'),
                'description' => request()->input('description'),
                'type' => request()->input('type'),
                'status' => request()->input('status'),
                'coordinate' => request()->input('coordinate')
            ]);
            return redirect()->back();
        }
        catch(Exception $e) {
            return redirect()->back()->with('message', 'You dont create Costumer or Work in database');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'costumer_id' => 'required_without',
            'worker_id' => 'required_without',
            'description' => 'required',
            'type' => 'required',
            'status' => 'required',
            'coordinate' => 'required_without'
        ]);

        $task = Task::find($id);
        $task->update($request->all());
        return redirect()->with('message', 'Costumer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Task::find($id)->status != "inprogress")
        {
            $data = Task::find($id);
            $data->delete();
            return redirect()->back();
        } else {
            return redirect()->back()->with('message', 'This is task already in progress');
        }
    }
}
