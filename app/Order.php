<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table ="order";
    protected $fillable= ['id', 'no_meja', 'tanggal', 'id_user', 'keterangan', 'status_order', 'jumlah_harga'];

    public function detail_order(){
        return $this->hasMany('App\Detail_Order', 'id_order', 'id');
    }
    public function transaksi(){
        return $this->hasMany('App\Transaksi', 'id_order', 'id');
    }
    public function user(){
        return $this ->belongsTo('App\User','id_user', 'id');
    }
}
