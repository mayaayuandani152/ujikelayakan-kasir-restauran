<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masakan extends Model
{
    //
    protected $table="masakan";
    protected $fillable = ['id', 'nama_masakan', 'harga', 'status_masakan', 'foto'];

    public function detail_order(){
        return $this->hasMany('App\Detail_Order', 'id_masakan', 'id');
    }
}
