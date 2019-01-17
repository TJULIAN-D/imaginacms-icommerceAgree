<?php

namespace Modules\Icommerceagree\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class IcommerceAgree extends Model
{
    use Translatable;

    protected $table = 'icommerceagree__icommerceagrees';
    public $translatedAttributes = [];
    protected $fillable = [];
}
