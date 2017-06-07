@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">To Do Lists</div>

                <div class="panel-body">
                        @foreach($todos as $todo)
                        {{$todo->topic}} </br>
                    @endforeach
                    <button type="button" onclick="location.href='{{ url('/todo/create') }}'">Add</button>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
