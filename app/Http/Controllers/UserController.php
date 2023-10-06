<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.inputUser');
    }

    public function store(Request $request)
    {
        // Validasi input

        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:50', Rule::unique('users'), 'regex:/^[^\s\W]+$/'],
            'nama' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'in:admin,user'],
            'password' => ['min:4'],
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
        $user = new User();
        $user->nama = $request->input('nama');
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password')); // Menggunakan bcrypt
        $user->role = $request->input('role');
        $user->status = 'Aktif';
        $user->save();

        return response()->json([
            'status' => true,
            'modal_close' => false,
            'message' => 'Data berhasil ditambahkan',
            'data' => null
        ]);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return response()->json([
            'status' => true,
            'modal_close' => false,
            'message' => 'Data berhasil dihapus',
            'data' => null
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        // Validasi inputan
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:50', Rule::unique('users')->ignore($user), 'regex:/^[^\s\W]+$/'],
            'nama' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:50'],
            'role' => ['required', 'string', 'max:50'],
            'password' => ['min:4', 'nullable'],
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
        if (!$user) {
            return response()->json(['error' => 'User tidak ditemukan.'], 404);
        }

        // Update data Admin
        $user->username = $request->input('username');
        $user->nama = $request->input('nama');
        $user->status = $request->input('status');
        $user->role = $request->input('role');

        if(empty($request->input('password'))){
    
        }else{
            $user->password = bcrypt($request->input('password'));   
        }

        // Proses upload dan update foto ke dalam server jika ada
        $user->save();

        // Update password jika diisi

        return response()->json([
            'status' => true,
            'modal_close' => false,
            'message' => 'Data berhasil diubah',
            'data' => null
        ]);
    }

    public function data()
    {
        $data = User::selectRaw('id, nama, username, status, role');

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
