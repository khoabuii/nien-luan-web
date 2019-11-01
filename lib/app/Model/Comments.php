<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
    protected $table='comments';
    protected $primaryKey='com_id';
    protected $guarded=[];

    public function user(){
        return $this->belongsTo('App\User','com_users','id');
    }
}
