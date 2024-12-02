<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mta extends Model
{
    protected $table = 'table_mta';

    protected $fillable = [
        'mta_code',
        'event',
        'description',
    ];
}
