<?php

namespace conference;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sector extends Model
{
     use SoftDeletes;
     protected $dates = ['deleted_at'];
}
