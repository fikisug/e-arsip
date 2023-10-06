<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class KategoriController extends Controller
{
    public function index()
    {
        return view('admin.inputKategori');
    }

    public function store(Request $request)
    {
        // Validasi input

        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255', Rule::unique('kategori')],
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal diubah. ' .$validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        // Simpan data ke database
        $kategori = new Kategori();
        $kategori->nama = $request->input('nama');
        $kategori->save();

        return response()->json([
            'status' => true,
            'modal_close' => false,
            'message' => 'Data berhasil ditambahkan',
            'data' => null
        ]);
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        // Validasi inputan
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255', Rule::unique('kategori')],
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal diubah. ' .$validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        // Cari data Admin berdasarkan ID
        if (!$kategori) {
            return response()->json(['error' => 'Kategori tidak ditemukan.'], 404);
        }

        // Update data Admin
        $kategori->nama = $request->input('nama');

        // Proses upload dan update foto ke dalam server jika ada
        $kategori->save();

        // Update password jika diisi

        return response()->json([
            'status' => true,
            'modal_close' => false,
            'message' => 'Data berhasil diubah',
            'data' => null
        ]);
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);

        $kategori->hapus = 1;

        $kategori->save();

        return response()->json([
            'status' => true,
            'modal_close' => false,
            'message' => 'Data berhasil dihapus',
            'data' => null
        ]);
    }

    public function data()
    {
        $data = Kategori::selectRaw('id, nama')->where('hapus', 0);

        return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('nomor', function ($data) {
                        // Hitung nomor urut secara dinamis
                        static $nomor = 0;
                        $nomor++;
                        return $nomor;
                    })
                    ->make(true);

        // $users = User::select(['id', 'nama', 'username']);

        // return DataTables::of($users)
            // ->make(true);
    }
}
