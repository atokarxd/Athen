<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Models\Task;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $costumers = Costumer::all();
        return view('costumers.index', ['costumers' => $costumers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('costumers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'fullName' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'coordinate' => 'nullable'
        ]);

        Costumer::create([
            'fullName' => request()->input('fullName'),
            'email' => request()->input('email'),
            'phone' => request()->input('phone'),
            'coordinate' => request()->input('coordinate')
        ]);

        //return redirect()->route('costumers.index')->with('success', "New Costumer create success");
        return redirect('costumer');
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
    public function edit(Costumer $costumer)
    {
        //$task = Task::all();
        //dd($task->where('costumer_id', 2)->first()->status);
        /*if($task->where('costumer_id', $costumer->id)->first() != null && $task->where('costumer_id', $costumer->id)->first()->status == 'inprogress') {
            return redirect()->back()->with('message', 'This is costumer already in use for a task in progress');
        } else {
            return view('costumers.edit', ['costumer' => $costumer]);
        }*/

        return view('costumers.edit', ['costumer' => $costumer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //dd($task = Task::where('costumer_id', $id)->get());

        $request->validate([
            'fullName' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'coordinate' => 'nullable'
        ]);

        $costumer = Costumer::find($id);
        $costumer->update($request->all());
        //Costumer::where('id' $costumer->id)->update($request->all());

        /*$costumer_data = Costumer::find($costumer->id);
        $costumer_data->fullName = request()->input('fullName');
        $costumer_data->fullName = request()->input('email');
        $costumer_data->fullName = request()->input('phone');
        $costumer_data->fullName = request()->input('coordinate');*/

        return redirect('costumer')->with('message', 'Costumer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::all();
        if($task->where('costumer_id', $id)->first() != null && $task->where('costumer_id', $id)->first()->status == 'inprogress') {
            return redirect()->back()->with('message', 'This is costumer already in use for a task in progress');
        } else {
            $costumer = Costumer::find($id);
            $costumer->delete();
            return redirect()->back();
        }
    }
}
