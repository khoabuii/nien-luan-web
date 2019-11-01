<?php

namespace App\Model;

use App\Model\Posts;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category';
    protected $primaryKey='cate_id';
    protected $guarded=[];

    public function posts(){
        return $this->hasMany('App\Model\Posts','post_cate','cate_id');
    }
}
