<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
class LevelController extends Controller
{
    //
    public function index(Request $request)
    {
        //
        $query = $request->get('q');
        $hasil = Level::where('nama_level', 'LIKE', '%' . $query . '%')->paginate(10);


    
        
        return view('table.level.index' , compact ('hasil', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $request->validate([
            'nama_level' => 'required',
        ]);

        Level::create([
            'nama_level' => $request->nama_level,
        ]);

        return redirect('/level')->with('sukses', 'Data berhasil di input');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $level = \App\Level::find($id);
        return view('table.level.show', compact('level'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $level = \App\Level::find($id);
        return view('table.level.edit', compact ('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'nama_level' => 'required',
		]);
        
        $level=([
            'nama_level' => $request->nama_level,
        ]);
        \App\Level::whereId($id)->update($level);
        return redirect('/level')->with('sukses', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $level= \App\Level::find($id);
        $admin->delete($level);
        return redirect('/level')->with('sukses', 'Data berhasil dihapus');
    }
}
