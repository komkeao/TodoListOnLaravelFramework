<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;
class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos=Todolist::all();
        $data['todos']= $todos;
        return view('home',$data);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo= new Todolist();
        $todo->topic=$request['topic'];
        $todo->content=$request['content'];
        $todo->user_id=5;
        $todo->save();
        $todos=Todolist::all();
        $data['todos']= $todos;
        return view('home',$data);

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $todo = Todolist::find($id);
        $data['action']='view';
        $data['todo']=$todo;
        // dd($data);
        return view('view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                //
        $todo = Todolist::find($id);
        $data['todo']=$todo;
        $data['action']="edit";
        
        
        // dd($data);
        return view('view',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo= Todolist::find($id);
        $todo->topic=$request['topic'];
        $todo->content=$request['content'];
        $todo->user_id="12";
        $todo->update();
        return redirect('todo');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo= Todolist::find($id);
        $todo->delete();
        return redirect('todo');
    }
}
