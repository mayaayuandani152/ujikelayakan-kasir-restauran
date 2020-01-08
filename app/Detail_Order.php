<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_Order extends Model
{
    //
protected $table="detail_order";
protected $fillable = ['id', 'id_order', 'id_masakan', 'keterangan', 'jumlah_harga'];

    public function order(){
        return $this ->belongsTo('App\Order','id_order', 'id');
    }
    public function masakan(){
        return $this ->belongsTo('App\Masakan','id_masakan', 'id');
    }
}
