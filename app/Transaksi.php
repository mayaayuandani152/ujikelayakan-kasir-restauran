<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    protected $table="transaksi";
    protected $fillable =['id', 'id_user','id_order','tanggal', 'total_bayar'];

    public function order(){
        return $this ->belongsTo('App\Order','id_order', 'id');
        
    }
    public function user(){
        return $this ->belongsTo('App\User','id_user', 'id');
    }
}
