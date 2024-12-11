<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KunjunganController extends Controller
{
    public function storePerencanaan(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nik'               => 'required',
            'nama_user'         => 'required',
            'phone_user'        => 'required',
            'dt_kunjungan'      => 'required',
            'lokasi_kunjungan'  => 'required',
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

        $dt_kunjungan = Carbon::parse($request->dt_kunjungan)->format('Y-m-d h:i:s');
        // $dt_kunjungan = Carbon::createFromFormat('d/m/Y h:i', $request->dt_kunjungan)->format('Y-m-d h:i:s');
        // dd($dt_kunjungan);
        //create post
        $post = Kunjungan::create([
            'nik'               => $request->nik,
            'nama_user'         => $request->nama_user,
            'phone_user'         => $request->phone_user,
            'dt_kunjungan'      => $dt_kunjungan,
            'lokasi_kunjungan'  => $request->lokasi_kunjungan,
            'nama_client'       => $request->nama_client,
            'jenis_kunjungan'   => $request->jenis_kunjungan,
            'stat_perencanaan'  => 'Y',
        ]);

        return response()->json([
            'message'=>'success',
            'data' => $post,
            'code' => 200,
        ]);
        //return response
        // return new PostResource(true, 'Data Post Berhasil Ditambahkan!', $post);
    }

    public function getPerencanaan($nik){
        $data = Kunjungan::where('nik','=',$nik)->where('stat_perencanaan','=','Y')->get();
        return response()->json($data, 200);
    }

    public function storekKunjungan(Request $request, $id)
     {
         // Validate the request
         $validated = $request->validate([
             'id'       => 'required|string',
             'geo_loc'  => 'required',
             'dt_realisasi'  => 'required',
         ]);
 
         $dt_realisasi = Carbon::parse($validated['dt_realisasi'])->format('Y-m-d h:i:s');
         // Find the Kunjungan by ID
         $kunjungan = Kunjungan::findOrFail($id);
 
         // Update the stat flag
         Kunjungan::where('id', '=', $validated['id'])->update([
            'stat_kunjungan' => 'Y',
            'todo' => $request->todo,
            'geo_loc' => $validated['geo_loc'],
            'dt_realisasi_kunjungan' => $dt_realisasi,
        ]);
 
         // Save the profile changes
         $kunjungan->save();
 
         return response()->json([
            'message' => 'Berhasil membuat kunjungan',
            'data' => $kunjungan,
            'code' => 200
        ]);
     }

     public function getRiwayatKunjungan($nik){
        $data = Kunjungan::where('nik','=',$nik)->where('stat_kunjungan','=','Y')->get();
        return response()->json($data, 200);
    }

     public function getStatistik($nik){
        $results = [];

        $count_of_pembinaan = Kunjungan::where('nik','=',$nik)->where('stat_kunjungan','=','Y')->where('stat_perencanaan','=','Y')->where('jenis_kunjungan','=','Pembinaan')->count();
        $count_of_penagihan = Kunjungan::where('nik','=',$nik)->where('stat_kunjungan','=','Y')->where('stat_perencanaan','=','Y')->where('jenis_kunjungan','=','Penagihan')->count();

        $pembinaan_counts['pembinaan'] = $count_of_pembinaan;
        $penagihan_counts['penagihan'] = $count_of_penagihan;

        array_push($results, [
            'pembinaan' => $count_of_pembinaan, 
            'penagihan' => $count_of_penagihan
        ]);

        // dd($results);

        return response()->json([
            'data'=> $results,
            'code' => 200,
        ]);
    }
}
