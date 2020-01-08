<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Level;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(Request $request)
    {
        //
        $level=\App\Level::all();
        $query = $request->get('q');
        $hasil = Admin::where('name', 'LIKE', '%' . $query . '%')->paginate(10);


    
        
        return view('table.admin.index' , compact ('hasil', 'query','level'));
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'id_level' => 'required',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'id_level' => $request->id_level,
        ]);

        return redirect('/pengguna')->with('sukses', 'Data berhasil di input');
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
        $admin = \App\Admin::find($id);
        return view('table.admin.show', compact('admin'));
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
        $level=\App\Level::all();
        $admin = \App\Admin::find($id);
        return view('table.admin.edit', compact ('admin', 'level'));
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
            'name' => 'required',
            'email' => 'required',
            'id_level' => 'required',
		]);
        
        $admin=([
            'name' => $request->name,
            'email' => $request->email,
            'id_level' => $request->id_level,
        ]);
        \App\Admin::whereId($id)->update($admin);
        return redirect('/pengguna')->with('sukses', 'Data berhasil diubah');
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
        $admin= \App\Admin::find($id);
        $admin->delete($admin);
        return redirect('/pengguna')->with('sukses', 'Data berhasil dihapus');
    }
    public function masuk(Request $admin)
    {
        //
        $data= Admin::where('username', $admin->username)->where('password', $admin->password)->get();
        if(count($data)>0){

            //data dari config.auth
            Auth::guard('admin')->LoginUsingId($data[0]['id']); //loginusingid=fungsi fari laravel
            return redirect('/pengguna');

        }else{
            return "Login gagal";
        }
        
    }
    public function keluar(){
        if(Auth::guard('admin')->check){
            Auth::guard('admin')->logout;
        }
        //kembali ke halaman login
        return redirect('/masuk');
    }
}
