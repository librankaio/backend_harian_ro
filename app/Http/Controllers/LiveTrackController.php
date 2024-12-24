<?php

namespace App\Http\Controllers;

use App\Models\UserTracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LiveTrackController extends Controller
{
    public function getLocation($nik){
        $data = UserTracking::where('nik','=',$nik)->get();
        return response()->json($data, 200);
    }

    public function storeLocation(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'user_id'         => 'required',
            'nik'               => 'required',
            'geo_loc'      => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $post = UserTracking::create([
            'user_id'      => $request->user_id,
            'nik'          => $request->nik,
            'geo_loc'      => $request->geo_loc,
        ]);

        return response()->json([
            'message'=>'success',
            'data' => $post,
            'code' => 200,
        ]);
        //return response
        // return new PostResource(true, 'Data Post Berhasil Ditambahkan!', $post);
    }
}
