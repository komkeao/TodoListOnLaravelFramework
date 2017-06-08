@extends('layouts.app') @section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Add To Do Lists</div>
        <div class="panel-body">
          <form class="form-horizontal" method="post" action="{{ url('/todo') }}">
           {{ Form::open(array('route' => array('todo.create'), 'method' => 'post','class'=> 'form-horizontal')) }}
            
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Topic:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="topic" placeholder="Enter Topic">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="pwd">Content:</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="content" rows="" cols="" placeholder="Content Is Here"></textarea>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
                <button type="button" class="btn btn-default" onclick="location.href='{{ url('/todo') }}'">Back</button>

              </div>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection