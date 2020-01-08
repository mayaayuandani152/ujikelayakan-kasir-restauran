<?php

namespace App\Http\Controllers;

use File;
use App\Masakan;
use Illuminate\Http\Request;

class MasakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $masakan = Masakan::all();
        $query = $request->get('q');
        $hasil = Masakan::where('nama_masakan', 'LIKE', '%' . $query . '%')->paginate(10);

        return view('table.masakan.index', compact('hasil', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'nama_masakan' => 'required',
            'harga' => 'required',
            'status_masakan' => 'required',
			'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('foto');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
 
		Masakan::create([
            'nama_masakan' => $request->nama_masakan,
            'harga' => $request->harga,
            'status_masakan' => $request->status_masakan,
			'foto' => $nama_file,
		]);
 
		return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Masakan  $masakan
     * @return \Illuminate\Http\Response
     */
    public function show(Masakan $masakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Masakan  $masakan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $masakan = \App\Masakan::find($id);

        return view('table.masakan.edit', compact('masakan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Masakan  $masakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'nama_masakan' => 'required',
            'harga' => 'required',
            'status_masakan' => 'required',
			'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('foto');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
 
		$foto=([
            'nama_masakan' => $request->nama_masakan,
            'harga' => $request->harga,
            'status_masakan' => $request->status_masakan,
			'foto' => $nama_file,
        ]);
        Masakan::whereId($id)->update($foto);
 
		return redirect()->route('masakan.index')->with('sukses', 'Data berhasil di ubah') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Masakan  $masakan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $masakan = Masakan::where('id',$id)->first();
        $masakan->delete();
        File::delete('data_file/'.$masakan->foto);
        return redirect()->route('masakan.index')->with('sukses', 'barang berhasil di hapus!!');
    }
}
