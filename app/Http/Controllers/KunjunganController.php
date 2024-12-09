<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KunjunganController extends Controller
{
    public function storeKunjungan(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nik'               => 'required',
            'nama_user'         => 'required',
            'dt_kunjungan'      => 'required',
            'lokasi_kunjungan'  => 'required',
            'geo_loc'           => 'required',
            'nama_client'       => 'required',
            'jenis_kunjungan'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/posts', $image->hashName());

        //create post
        $post = Kunjungan::create([
            'nik'               => $request->nik,
            'nama_user'         => $request->nama_user,
            'dt_kunjungan'      => $request->dt_kunjungan,
            'lokasi_kunjungan'  => $request->lokasi_kunjungan,
            'geo_loc'           => $request->geo_loc,
            'nama_client'       => $request->nama_client,
            'jenis_kunjungan'   => $request->jenis_kunjungan,
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
