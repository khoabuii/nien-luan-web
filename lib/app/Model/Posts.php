<?php

namespace App\Model;

use App\Model\Category;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    protected $table='posts';
    protected $primaryKey='post_id';
    protected $guarded=[];
    public function category(){
        return $this->belongsTo('App\Model\Category','post_cate','cate_id');
    }
}
