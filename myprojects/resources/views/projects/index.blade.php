@extends('layouts.app')
@section('content')
    <div class="container">
        @forelse ($projects as $project)
        <div style="text-align:center;">
            <h1>
                <a href="projects/{{$project->id}}">{{$project->title}}</a>
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
            <form action="projects/{{$project->id}}" method="POST">
                @csrf
                @method("DELETE")
                <input type="submit" value="delete">
            </form>
            <hr>
        </div>
        @empty
             you have no projects 

        @endforelse
        <a href="/projects/create">create</a>
    </div>
@endsection
