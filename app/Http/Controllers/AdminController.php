<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    public function index()
    {
        $jmlFile = DB::table('kategori as a')
            ->leftJoin('file as b', 'b.id_kategori', '=', 'a.id')
            ->selectRaw('COUNT(b.id) as count, a.nama, a.id')
            ->groupBy('a.id', 'a.nama')
            ->get();
        if (auth()->user()->role == 'admin') {
            return view('admin.dashboard')
                ->with('jmlFile', $jmlFile);
        }else{
            return view('user.dashboard')
                ->with('jmlFile', $jmlFile);
        }
    }

    public function dataKategori($id)
    {
        $data = DB::table('file as a')
            ->join('kategori as b', 'a.id_kategori', '=', 'b.id')
            ->join('users as c', 'a.uploader', '=', 'c.id')
            ->select('a.nama', 'a.id', 'b.nama as kategori', 'c.nama as uploader', 'a.file')
            ->selectRaw("SUBSTRING_INDEX(a.file, '/', -1) as file_name")
            ->where('a.id_kategori', $id)
            ->get();
        $kategori = Kategori::find($id);
        $namaKategori = $kategori->nama;

        if (auth()->user()->role == 'admin') {
            return view('admin.kategori')
                ->with('data', $data)
                ->with('namaKategori', $namaKategori);
        }else{
            return view('user.kategori')
                ->with('data', $data)
                ->with('namaKategori', $namaKategori);
        }
    }
}
