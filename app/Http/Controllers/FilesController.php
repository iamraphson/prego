<?php

namespace Prego\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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

        //MimeType::detectByFileExtension($request->file('file_name')->getClientOriginalExtension());
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

}
