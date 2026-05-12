<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPromo extends Model
{
    protected $table = 'promo';

    protected $fillable = [
        'kodepromo',
        'namapromo',
        'jenis',
        'nilaidiskon',
        'minimalbelanja',
        'tanggalmulai',
        'tanggalselesai',
        'status',
    ];
}