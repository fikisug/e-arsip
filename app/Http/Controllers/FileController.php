<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class FileController extends Controller
{
    public function index($id)
    {
        $nmKategori = Kategori::find($id);
        $namaKategori = $nmKategori->nama;

        if (auth()->user()->role == 'admin') {
            return view('admin.inputFile', ['categoryId' => $id, 'namaKategori' => $namaKategori]);
        }else{
            return view('user.inputFile', ['categoryId' => $id, 'namaKategori' => $namaKategori]);
        }
        
    }

    public function store(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'file' => ['required'],
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal diubah. ' .$validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        if ($request->file('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            $image_name = $file->storeAs('file/' .$id , $filename, 'public');
        }        

        File::create([
            'nama' => $request->input('nama'),
            'id_kategori' => $id,
            'file' => $image_name,
            'uploader' => auth()->user()->id,
        ]);

        return response()->json([
            'status' => true,
            'modal_close' => false,
            'message' => 'Data berhasil ditambahkan',
            'data' => null
        ]);
    }

    public function destroy($id)
    {
        $file = File::find($id);
        $path = 'public/'.File::find($id)->file;

        Storage::delete($path);
        $file->delete();

        return response()->json([
            'status' => true,
            'modal_close' => false,
            'message' => 'Data berhasil dihapus',
            'data' => null
        ]);
    }

    public function data($id)
    {
        $data = File::selectRaw('id, nama, file')
            ->where('id_kategori', $id)
            ->where('uploader', auth()->user()->id);

        return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('nomor', function ($data) {
                        // Hitung nomor urut secara dinamis
                        static $nomor = 0;
                        $nomor++;
                        return $nomor;
                    })
                    ->addColumn('file_name', function ($data) {
                        // Access the computed file_name attribute
                        return $data->file_name;
                    })
                    ->make(true);

        // $users = User::select(['id', 'nama', 'username']);

        // return DataTables::of($users)
            // ->make(true);
    }

    public function dataAll()
    {
        $data = DB::table('file as a')
            ->join('kategori as b', 'a.id_kategori', '=', 'b.id')
            ->join('users as c', 'a.uploader', '=', 'c.id')
            ->select('a.nama', 'a.id', 'b.nama as kategori', 'c.nama as uploader', 'a.file')
            ->selectRaw("SUBSTRING_INDEX(a.file, '/', -1) as file_name")
            ->get();


        return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('nomor', function ($data) {
                        // Hitung nomor urut secara dinamis
                        static $nomor = 0;
                        $nomor++;
                        return $nomor;
                    })
                    ->addColumn('file_name', function ($data) {
                        // Access the computed file_name attribute
                        return $data->file_name;
                    })
                    ->make(true);

        // $users = User::select(['id', 'nama', 'username']);

        // return DataTables::of($users)
            // ->make(true);
    }

    public function download($id)
    {
        $file = File::findOrFail($id);
        $file1 = storage_path('app\public' . '\\' . $file->file); // Sesuaikan dengan lokasi penyimpanan file Anda

        //return response()->download($file1);
        return response()->json([
            'status' => true,
            'modal_close' => false,
            'message' => 'Data berhasil dihapus',
            'data' => null
        ]);
    }
}
