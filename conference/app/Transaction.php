<?php

namespace conference;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];
  protected $fillable = [
    "transaction_user",
     "transaction_name",
     "transaction_nit",
     "transaction_phone",
     "transaction_sector",
     "sector_price",
     "sector_quantity",
     "transaction_assistants",
     "payment_type",
     "transaction_total",
  ];
}
