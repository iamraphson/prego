<?php

namespace Prego\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Util\MimeType;
use Prego\Files;
use Prego\Http\Requests;

class FilesController extends Controller{

    public function uploadAttachments(Request $request, $projectId){

        $this->validate($request, [
            'file_name'     => 'required|mimes:jpg,jpeg,bmp,png,pdf|between:1,7000',
        ]);

        $file = $request->file('file_name');

        $fileObject = $this->saveUploads($projectId, $request->file('file_name')->getClientOriginalName());

        $fileName =  $fileObject->id . "." . $request->file('file_name')->getClientOriginalExtension();

        Storage::put($projectId . '/' . $fileName,  File::get($file));

        $this->saveFileUrl($fileObject->id, $projectId . '/' . $fileName);
        return redirect()->back()->with('info', 'Your Attachment has been uploaded Successfully');

    }

    public function saveUploads($projectId, $originalName){
        $file = new Files();
        $file->file_name = $originalName;
        $file->project_id = $projectId;
        $file->save();

        return $file;
    }

    public function saveFileUrl($id, $fileUrl){
        $file = Files::findOrFail($id);
        $file->file_url = $fileUrl;
        $file->save();
    }

    public function getFile($projectId, $fileId){
        $fileObject = Files::where('project_id', $projectId)->where('id', $fileId)->first();
        $file = Storage::get($fileObject->file_url);

        $mimeType = Storage::mimeType($fileObject->file_url);

        return response($file, 200)->header('Content-Type', $mimeType);
    }

    public function deleteOneProjectFile($projectId, $fileId){
        $fileObject = Files::where('project_id', $projectId)->where('id', $fileId)->first();
        Storage::delete($fileObject->file_url);

        DB::table('prego_files')
            ->where('project_id', $projectId)
            ->where('id', $fileId)
            ->delete();
    }

}
