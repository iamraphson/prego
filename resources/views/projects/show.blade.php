<?php
/**
 * Created by PhpStorm.
 * User: Raphson
 * Date: 9/25/15
 * Time: 20:43
 */
?>
@extends('layouts.master')

@section('content')

    @include('layouts.partials.sidebar')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        @include('layouts.partials.alerts')
        @if( $project )
            <h1 class="page-header">
                {!! $project->project_name !!}
            </h1>

            <div class="container">
                <div class="row">
                    <div class="col-md-3" style="border:1px solid #ccc;margin-left:5px;padding:10px;">
                        <p>Due : {!! date_format(new DateTime($project->due_date), "D, m Y") !!}</p>
                        <p>Status: {!! $project->project_status !!}</p>
                        <p>Tasks: 0</p>
                        <p>Comments: 0</p>
                        <p>Attachments: 0</p>
                        <p><a href="/projects/{{ $project->id }}/edit">Edit</a></p>
                        <p>
                            <button class="btn btn-circle btn-danger delete"
                                    data-action="{{ url('projects/' . $project->id) }}"
                                    data-return="{{ url('projects') }}"
                                    data-token="{{csrf_token()}}">
                                <i class="fa fa-trash-o"></i>Delete
                            </button>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @include('tasks.form')
                    @include('files.form')
                </div>
                <hr>
                <div class="row">
                    <h4 class="page-header">
                        Comments
                    </h4>
                    <div class="row" style="margin-left:5px;padding:5px;">
                        <form class="form-vertical" role="form" enctype="multipart/form-data" method="post" action="#">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <textarea name="comment" class="form-control" style="width:80%;" id="comment" rows="5" cols="5"></textarea>
                                @if ($errors->has('comment'))
                                    <span class="help-block">{{ $errors->first('comment') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Add Comment</button>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
@stop