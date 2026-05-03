<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelShift extends Model
{
    protected $table = 'shift';

    protected $fillable = [
        'userid',
        'shiftmulai',
        'shiftselesai',
        'saldoawal',
        'saldoakhir',
        'totaltransaksi',
        'status'
    ];

    protected $casts = [
        'shiftmulai' => 'datetime',
        'shiftselesai' => 'datetime',
        'saldoawal' => 'decimal:2',
        'saldoakhir' => 'decimal:2',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongsTo(ModelUser::class, 'userid', 'id');
    }
}