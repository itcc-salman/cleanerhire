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

    public function getDistanceBetweenTwoPoints($lat1,$long1,$lat2,$long2)
    {
        $earthRadius = 6371;  // earth radius in km
        $point1Lat = $lat1;
        $point2Lat = $lat2;
        $deltaLat = deg2rad($point2Lat - $point1Lat);
        $point1Long = $long1;
        $point2Long = $long2;
        $deltaLong = deg2rad($point2Long - $point1Long);
        $a = sin($deltaLat/2) * sin($deltaLat/2) + cos(deg2rad($point1Lat)) * cos(deg2rad($point2Lat)) * sin($deltaLong/2) * sin($deltaLong/2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));

        $distance = $earthRadius * $c;
        return $distance;    // in km
    }
}
