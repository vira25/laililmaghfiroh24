<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class pegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 2;
        if(strlen($katakunci)){
            $data = pegawai::where('Notelpon','like',"%$katakunci%")
                ->orWhere('Nama', 'like', "%$katakunci%")
                ->orWhere('level', 'like', "%$katakunci%")
                ->orWhere('Alamat', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else{
            $data = pegawai::orderBy('Nama','desc')->paginate($jumlahbaris);
        }
        return view('pegawai.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('Nama', $request->Nama);
        Session::flash('Notelpon', $request->Notelpon);
        Session::flash('level', $request->level);
        Session::flash('Alamat', $request->Alamat);
        
        $request->validate([
            'Nama'=>'required|',
            'Notelpon'=>'required|numeric|unique:pegawai,Notelpon',
            'level'=>'required|',
            'Alamat'=>'required|',
        ],[
            'Nama.required'=> 'Nama wajib diisi',
            'Notelpon.required'=> 'Notelpon wajib diisi',
            'Notelpon.numeric'=> 'Notelpon wajib dalam angka',
            'Notelpon.unique'=> 'Notelpon sudah ada',
            'level.required'=>'level harus diisi',
            'Alamat.required'=> 'Alamat wajib diisi',
        ]);
        $data =[
            'Nama'=>$request->Nama,
            'Notelpon'=>$request->Notelpon,
            'level'=>$request->level,
            'Alamat'=>$request->Alamat,
        ];
        pegawai::create($data);

        return Redirect()->to('pegawai')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = pegawai::where('Nama',$id)->first();
        return view("pegawai.edit")->with('data', $data); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Nama'=>'required|',
            'level'=>'required|',
            'Alamat'=>'required|',
        ],[
            'Nama.required'=> 'Nama wajib diisi',
            'level.required'=> 'level wajib diisi',
            'Alamat.required'=> 'Alamat wajib diisi',
        ]);
        $data =[
            'Nama'=>$request->Nama,
            'level'=>$request->level,
            'Alamat'=>$request->Alamat,
        ];
        pegawai::where('Notelpon', $id)->update($data);
        return Redirect()->to('pegawai')->with('success', 'Data telah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        pegawai::where('Notelpon', $id)->delete();
        return redirect()->to('pegawai')->with('success', 'Data berhasil dihapus');
    }

}
