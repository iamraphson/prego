<?php
/**
 * Created by PhpStorm.
 * User: Raphson
 * Date: 10/5/15
 * Time: 12:11
 */
?>
<div class="col-md-5">
    <h4 class="page-header">Files</h4>
    <div class="row" style="border:1px solid #ccc;margin-left:5px;width:100%;padding:15px;">
        @if( $files)
            @foreach( $files as $file)
                <div style="text-overflow: ellipsis;width: 60%;overflow: hidden">
                    <div><i class="fa fa-check-square-o"></i>
                        <span>
                            <a href="/projects/{{ $project->id }}/files/get/{{ $file->id }}" target="_blank">{{ $file->file_name }}</a>
                        </span>
                    </div>
                </div>
                <hr/>
            @endforeach
        @endif
        <form class="form-vertical"  role="form" method="post" action="{{ route('projects.files', ['projects' => $project->id]) }}" enctype="multipart/form-data">
            <div class="form-group{{ $errors->has('file_name') ? ' has-error' : '' }}">
                <input type="file" name="file_name" class="form-control" id="file_name">
                @if ($errors->has('file_name'))
                    <span class="help-block">{{ $errors->first('file_name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-info">Add Files</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
</div>
