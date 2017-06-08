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
        //Show List Of Item
        $todos=Todolist::all();
        $data['todos']= $todos;
        return view('home',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Go To Add Todo List Page
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
        //Add Todo List To Database
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
        //Show Details of Todo Lists
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
        //Go to Edit Page with Old Data
        $todo = Todolist::find($id);
        $data['todo']=$todo;
        $data['action']="edit";
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
        //Update Data into Database
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
        //Delete Todo List in Database by Id
        $todo= Todolist::find($id);
        $todo->delete();
        return redirect('todo');
    }
}
