<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\Photo;
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
            'phone_client'      => 'required',
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
        
        $dt_kunjungan = Carbon::parse($request->dt_kunjungan)->format('Y-m-d H:i:s');

        // $dt_kunjungan = Carbon::createFromFormat('d/m/Y h:i', $request->dt_kunjungan)->format('Y-m-d h:i:s');
        // dd($dt_kunjungan);
        //create post
        $post = Kunjungan::create([
            'nik'               => $request->nik,
            'nama_user'         => $request->nama_user,
            'phone_client'      => $request->phone_client,
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
        // dd($nik);
        $data = Kunjungan::where('nik','=',$nik)->where('stat_perencanaan','=','Y')->whereNull('stat_kunjungan')->get();
        return response()->json($data, 200);
    }

    public function storeKunjungan(Request $request)
     {
        // Validate the request
         $validated = $request->validate([
             'kunjungan_id' => 'required|integer',
             'geo_loc'      => 'required',
             'alamat'      => 'required',
             'dt_realisasi' => 'required',
             'photo'        => 'required|image|mimes:jpeg,png,jpg,gif|',
         ]);

         // Find the Kunjungan by ID
         $kunjungan = Kunjungan::findOrFail($validated['kunjungan_id']);

         $dt_realisasi = Carbon::parse($request->dt_realisasi)->format('Y-m-d H:i:s');

         // Update the stat flag
         Kunjungan::where('id', '=', $request->kunjungan_id)->update([
            'stat_kunjungan' => 'Y',
            'todo' => $request->todo,
            'geo_loc' => $request->geo_loc,
            'alamat' => $request->alamat,
            'dt_realisasi_kunjungan' => $dt_realisasi,
        ]);

        $originalname_img_upload = request('photo')->getClientOriginalName();
        $path_upload = "img_kunjungan/$request->kunjungan_id/";
        request()->file('photo')->storeAs($path_upload, $originalname_img_upload);

        //UPDATE FILE TO DB
        Photo::create([
            'kunjungan_id' => $request->kunjungan_id,
            'file' => request()->file('photo')->getClientOriginalName(),
        ]);
 
        $kunjungan = Kunjungan::findOrFail($validated['kunjungan_id']);
         return response()->json([
            'message' => 'Berhasil membuat kunjungan',
            'data' => $kunjungan,
            'code' => 200
        ]);
     }

     public function getRiwayatKunjungan($nik){
        $data = Kunjungan::where('nik','=',$nik)->where('stat_kunjungan','=','Y')->where('stat_kunjungan','=','Y')->with(['photo'])->get();

        return response()->json($data, 200);
    }

     public function getStatistik($nik){
        // dd(request()->all());
        $results = [];

        $count_of_pembinaan = Kunjungan::where('nik','=',$nik)->where('stat_kunjungan','=','Y')->where('stat_perencanaan','=','Y')->where('jenis_kunjungan','=','Pembinaan')->whereBetween('dt_realisasi_kunjungan', [request('dtfrom'), request('dtto')])->count();
        $count_of_penagihan = Kunjungan::where('nik','=',$nik)->where('stat_kunjungan','=','Y')->where('stat_perencanaan','=','Y')->where('jenis_kunjungan','=','Penagihan')->whereBetween('dt_realisasi_kunjungan', [request('dtfrom'), request('dtto')])->count();

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
    
    public function getPembinaan($nik){
        $data = Kunjungan::where('nik','=',$nik)->where('stat_kunjungan','=','Y')->where('stat_perencanaan','=','Y')->where('jenis_kunjungan','=','Pembinaan')->get();
        return response()->json($data, 200);
    }

    public function getPenagihan($nik){
        $data = Kunjungan::where('nik','=',$nik)->where('stat_kunjungan','=','Y')->where('stat_perencanaan','=','Y')->where('jenis_kunjungan','=','Penagihan')->get();
        return response()->json($data, 200);
    }
}
