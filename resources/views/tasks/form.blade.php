<?php
/**
 * Created by PhpStorm.
 * User: Raphson
 * Date: 10/4/15
 * Time: 17:28
 */
?>
<div class="col-md-5">
    <h4 class="page-header">Tasks</h4>
    <div class="row" style="border:1px solid #ccc;margin-left:5px;width:100%;padding:15px;">
        @if( $tasks)
            @foreach( $tasks as $task)
                <div>
                    <div class="col-md-10 pull-left"><i class="fa fa-check-square-o"></i> <span>{{ $task->task_name }}</span></div>
                    <div class="col-md-12" style="margin-bottom: 10px;">
                        <a href="/projects/{{ $project->id }}/tasks/{{ $task->id }}/edit">Edit</a>
                        <button class="btn btn-danger delete pull-right"
                                data-action="/projects/{{ $project->id }}/tasks/{{ $task->id }}"
                                data-return="{{ url('projects/' . $project->id ) }}"
                                data-token="{{csrf_token()}}">
                            <i class="fa fa-trash-o"></i>Delete
                        </button>
                    </div>
                </div>
                <hr/>
            @endforeach
        @endif
        <form class="form-vertical" role="form" method="post" action="{{ route('projects.tasks.create', $project->id) }}">
            <div class="form-group{{ $errors->has('task_name') ? ' has-error' : '' }}">
                <input type="text" name="task_name" class="form-control" id="name" value="{{ old('task_name') ?: '' }}">
                @if ($errors->has('task_name'))
                    <span class="help-block">{{ $errors->first('task_name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info">Create Task</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
</div>