<?php

namespace app\Admin;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modules';
    public $timestamps = false;
    protected $fillable = ['name'];
}
