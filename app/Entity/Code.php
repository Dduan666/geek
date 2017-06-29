<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $table = 'code';
    protected $primaryKey = 'id';

    public $timestamps = false;
}
