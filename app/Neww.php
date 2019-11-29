<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neww extends Model
{
    //主键
    public $primaryKey='n_id';
    //表名
    protected $table = 'new';
    //去除自主创建的时间
    public $timestamps = false;
    //白名单  表设计中不允许为空的
    protected $guarded = [];
}
