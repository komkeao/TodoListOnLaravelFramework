@extends('layouts.app') @section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">To Do Lists</div>

        <div class="panel-body">
          <div class="list-group">
            @foreach($todos as $todo)
            <a href="{{url('/todo')}}/{{$todo->id}}" class="list-group-item">
                {{$todo->topic}}
            </a>
            @endforeach
          </div>
          <button type="button" onclick="location.href='{{ url('/todo/create') }}'">Add</button>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection