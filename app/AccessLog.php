<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessLog extends Model
{
    const CREATED_AT='updated_at';
  protected $table='tbl_access_logs';
}
