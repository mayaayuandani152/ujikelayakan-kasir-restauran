<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masakan;
use App\Order;
use App\Detail_Order;
use App\User;
use App\Transaksi;
use Carbon\Carbon;
use Auth;

class UserController extends Controller
{
    //

    public function index(){
        $masakan = \App\Masakan::inRandomOrder()->take(6)->get();
        

        
        return view('user.shop')->with('masakan', $masakan);
    }


    public function shop($id){
        $masakan = \App\Masakan::find($id);
        return view('user.modal_shop', compact('masakan'));
    }


    // Halaman Keranjang
    public function keranjang(){
        return view('user.keranjang');
    }
    public function checkout(){
        $order = \App\Order::where('id_user', Auth::user()->id)->where('status_order', 0)->first();

        if(!empty($order)){
            $order_detail = \App\Detail_Order::where('id_order', $order->id)->get();
            return view('user.keranjang', compact('order','order_detail'));
        }
        return view('user.keranjang', compact('order'));

        // return view('user.checkout');
    }

    public function masakan_store(Request $request, $id){
        $masakan = \App\Masakan::where('id', $id)->first();
        $tanggal = Carbon::now();
        
        // cek apakah masih ada stok
        // if($request->jumlah > $masakan->status_masakan){
        //     return redirect('/shop');
        // }
        // cek vallidasi
        $cek_order= \App\Order::where('id_user', Auth::user()->id)->where('status_order', 0)->first();
        if(empty($cek_order)){
            $order= new Order;
            $order->no_meja = $request->no_meja;
            $order->id_user = Auth::user()->id;
            $order->tanggal = $tanggal;
            $order->status_order = 0;
            $order->save();
        }
        // simpan ke database pesanan_detail
        $order_baru = \App\Order::where('id_user', Auth::user()->id)->where('status_order', 0)->first();

        // cek pesanan detail
        $cek_order_detail = Detail_Order::where('id_masakan', $masakan->id)->where('id_order', $order_baru->id)->first();
        if(empty($cek_order_detail)){
        $order_detail = new Detail_Order;
        $order_detail->id_masakan = $masakan->id;
        $order_detail->id_order = $order_baru->id;
        $order_detail->keterangan = $request->keterangan;
        $order_detail->jumlah_harga= $masakan->harga*$request->keterangan;
        $order_detail->save();
        }else{
            $order_detail = Detail_Order::where('id_masakan', $masakan->id)->where('id_order', $order_baru->id)->first();
            $order_detail->keterangan = $order_detail->keterangan+$request->keterangan;

            // harga sekarang
            $harga_order_detail_baru = $masakan->harga*$request->keterangan;
            $order_detail->jumlah_harga = $order_detail->jumlah_harga+$harga_order_detail_baru;
            $order_detail->update();
        }
        // jumlah total
        $transaksi = \App\Transaksi::where('id_user', Auth::user()->id)->first();
        $transaksi = new Transaksi;
        $transaksi->total_bayar = $transaksi->total_bayar+$masakan->harga*$request->keterangan;
            $transaksi->tanggal = $tanggal;
            $transaksi->id_user = Auth::user()->id;
            $transaksi->id_order = $transaksi;
        $transaksi->update();
        

        return redirect()->route('shop.c');

        


        // $duplikat = Cart::search(function ($cartItem, $rowId) use ($request){
        //     return $cartItem->id === $request->id;
        // });
        // if($duplikat->isNotEmpty()){
        //     return redirect()->route('keranjang.index')->with('pesan_sukses', 'Item sudah ada di keranjang anda');
        // }
        // Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Produk');
        // $foto=([
        //     'jumlah' => $request->quantity,]);
        // return redirect()->route('keranjang.index')->with('pesan_sukses','Item telah di tambahkan ke keranjang');
    }
}
