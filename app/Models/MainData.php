<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainData extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'nomor_proposal',
        'deskripsi_pekerjaan',
        'amount_sc',
        'amount_po',
        'budget',
        'cost_center_id',
        'mta_id',
        'vendor',
        'sc_no',
        'po_no',
        'status_gr',
        'periode',
        'gr_no',
        'note',
    ];

    public function costCenter()
    {
        return $this->belongsTo(CostCenter::class, 'cost_center_id', 'id');
    }

    public function mta()
    {
        return $this->belongsTo(Mta::class, 'mta_id', 'id');
    }
}
