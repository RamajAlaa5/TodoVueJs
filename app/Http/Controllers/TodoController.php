<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos=Todo::all()->toArray();
        return array_reverse($todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = new Todo([
            'name'=>request('name'),
            'priority'=>request('priority'),
            'description'=>request('description')
         ]);
         $todo->save();
         return response()->json("Todo Successfully Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo=Todo::findOrFail($id);
        if($todo){
            return response()->json($todo);
        }
        return response()->json('Todo Not Found ');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $todo=Todo::findOrFail($id);
        $todo->update([
            'name'=>request('name'),
            'priority'=>request('priority'),
            'description'=>request('description')
        ]);
        return response()->json('Todo updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo=Todo::findOrFail($id);
        if($todo){
            $todo->delete();
            return response()->json('Todo deleted Successfully');
        }
        return response()->json('Todo Not Found To Be Deleted');


    }
}
