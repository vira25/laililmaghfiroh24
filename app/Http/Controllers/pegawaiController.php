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
    public function index()
    {
        $data = pegawai::orderBy('Nama','desc')->paginate(4); // paginate(4) untuk memberikan batas pada hal paginat
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
        Session::flash('Nama', $request->Nama); //untk menyimpan data sementara
        Session::flash('Notelpon', $request->Notelpon);
        Session::flash('level', $request->level);
        Session::flash('Alamat', $request->Alamat);
        
        $request->validate ([
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
        pegawai::create($data);  //Membuat dan menyimpan data baru ke dalam tabel pegawai
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
        return Redirect()->to('pegawai')->with('success', 'Data telah diupdate'); // jika validate berhasil akan disimpan dan diarakan ke hal pegawai dengan notofikasi data telah diupdate/success
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
