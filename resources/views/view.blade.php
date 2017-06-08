@extends('layouts.app') @section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Add To Do Lists</div>

        <div class="panel-body">
          {{ Form::open(array('route' => array('todo.update', $todo->id), 'method' => 'put','class'=> 'form-horizontal')) }}
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Topic:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="topic" placeholder="Enter Topic" @if($action=='view' ) disabled @endif value="{{$todo->topic}}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="pwd">Content:</label>
              <div class="col-sm-10">
                <textarea class="form-control" @if($action=='view' ) disabled @endif name="content" rows="" cols="" placeholder="Content Is Here">{{$todo->content}}</textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                @if($action=='view')
                <button type="button" class="btn btn-default" onclick="location.href='{{ url('/todo') }}/{{$todo->id}}/edit'">Edit</button>
                @else 
                <button type="submit" class="btn btn-default" onclick="location.href='{{ url('/todo') }}/{{$todo->id}}/edit'">Save</button>
                @endif
                <button type="button" class="btn btn-default" onclick="location.href='{{ url('/todo') }}'">Back</button>               
                <button type="button" onclick="document.getElementById('form-submit').submit()" class="btn btn-default">Delete</button>  
              </div>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          {{ Form::close() }}
          {{ Form::open(array('route' => array('todo.destroy', $todo->id), 'method' => 'delete','id'=> 'form-submit')) }}
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection