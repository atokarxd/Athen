<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workers = Worker::all(); 
        return view('workers.index', ['workers' => $workers]);
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('workers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required_without',
            'lastName' => 'required_without',
            'email' => 'required_without',
            'coordinate' => 'required_without'
        ]);


        Worker::create([
            'firstName' => request()->input('firstName'),
            'lastName' => request()->input('lastName'),
            'email' => request()->input('email'),
            'coordinate' => request()->input('coordinate')
        ]);

        return redirect('worker');
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
    public function edit(Worker $worker)
    {
        return view('workers.edit', ['worker' => $worker]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'coordinate' => 'nullable'
        ]);

        $worker = Worker::find($id);
        $worker->update($request->all());
        return redirect('worker')->with('message', 'Costumer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::all();
        if($task->where('worker_id', $id)->first() != null && $task->where('worker_id', $id)->first()->status == 'inprogress') {
            return redirect()->back()->with('message', 'This is costumer already in use for a task in progress');
        } else {
            $worker = Worker::find($id);
            $worker->delete();
            return redirect()->back();
        }
    }
}
