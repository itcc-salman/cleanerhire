<?php

namespace App\Services;

use Illuminate\Http\Request;

class CommonService
{

    public function __construct(){

    }

    public function saveUploadedFile(Request $request) {
        $file = $request->file('file');

        //Move Uploaded File
        $destinationPath = public_path('backend\uploads');
        $fileName = time().$file->getClientOriginalName();

        $data = array();
        if( $file->move($destinationPath,$fileName) ){
            $data['code'] = 200;
            $data['data'] = $fileName;
            $data['message'] = 'File uploaded successfully..!';
        } else {
            $data['code'] = 400;
            $data['data'] = null;
            $data['message'] = 'Something went wrong..!';
        }
        return $data;
    }
}
