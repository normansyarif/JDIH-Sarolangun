<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function upload(Request $req)
    {
        if ($req->hasFile('upload')) {
            $originName = $req->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $req->file('upload')->getClientOriginalExtension();

            if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
                $fileName = $fileName . '_' . time() . '.' . $extension;

                $req->file('upload')->move(public_path('ckeditor_images'), $fileName);

                $CKEditorFuncNum = $req->input('CKEditorFuncNum');
                $url = asset('uploads/ckeditor_images/' . $fileName);
                $msg = 'Image uploaded successfully';
                $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

                @header('Content-type: text/html; charset=utf-8');
                echo $response;
            }
        }
    }
}
