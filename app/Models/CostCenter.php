<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CostCenter extends Model
{
    protected $table = 'table_costcenter';

    protected $fillable = [
        'cc_code',
        'name',
    ];
}
