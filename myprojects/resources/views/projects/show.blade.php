@extends('layouts.app')
@section('content')
<div class="container" style="text-align:center;">
    <h1>
        {{$project->title}}
    </h1>
    <h3>
        {{$project->description}}
    </h3>
    <p>
        @switch($project->status)
                    @case(1)
                        completed
                    @break
                    @case(2)
                        canceled
                    @break
                    @default
                        on prosses
                @endswitch
    </p>
    <a href="/projects/{{$project->id}}/edit">edit</a>
    <br>
    <br>
    <form action="projects/{{$project->id}}" method="POST">
        @csrf
        @method("DELETE")
        <input type="submit" value="delete">
    </form>
    <hr>
       <form action="/projects/{{$project->id}}/tasks" method="post">
            @csrf
            add task 
            <input type="text" name="body">
            <input type="submit" value="send">
       </form>
       @foreach ($project->tasks as $task)
       <br>
            <div class="rank">
                <form action="/tasks/{{$task->id}}" method="POST">
                    @csrf
                    @method("PATCH")
                    <input type="checkbox" name="done" {{$task->done ? 'checked' : ''}} onchange="this.form.submit()">
                </form>
                <h4>
                    {{$task->body}}
                </h4>
                <form action="/tasks/{{$task->id}}" method="post">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="delete">
                </form>
            </div>          
       @endforeach
    <hr>
    <a href="/projects">all</a>
</div>
@endsection
