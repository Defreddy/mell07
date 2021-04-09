@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <h1>Your tasks</h1>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">To do</div>
                <div class="card-body">
                    @foreach ($tasks as $task)
                        @if ($task->status == 'todo')
                            <div class="card" style="margin-bottom: 10px;">
                                <div class="card-body">
                                    <p>{{ $task->description }}</p>
                                    <a class="btn btn-light float-right" href="{{ route('move_task', [$task->id]) }}">Move</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="card">
                        <div class="card-body">
                            <form class="form" action="{{url('tasks')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="description" class="sr-only">Description</label>
                                    <input class="form-control" id="description" name="description" placeholder="Description">
                                    <input type="hidden" id="status" name="status" value="todo">
                                </div>
                                <button type="submit" class="btn btn-dark float-right">Add Task</button>
                            </form>     
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Doing</div>
                <div class="card-body">
                    @foreach ($tasks as $task)
                        @if ($task->status == 'doing')
                            <div class="card" style="margin-bottom: 10px;">
                                <div class="card-body">
                                    <p>{{ $task->description }}</p>
                                    <a class="btn btn-light float-right" href="{{ route('move_task', [$task->id]) }}">Move</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Done</div>
                <div class="card-body">
                    @foreach ($tasks as $task)
                        @if ($task->status == 'done')
                            <div class="card" style="margin-bottom: 10px;">
                                <div class="card-body">
                                    <p>{{ $task->description }}</p>
                                    <a class="btn btn-danger float-right" href="{{ route('delete_task', [$task->id]) }}">Delete</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
