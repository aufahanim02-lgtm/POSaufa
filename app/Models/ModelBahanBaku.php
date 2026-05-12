<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelBahanBaku extends Model
{
    use HasFactory;

    protected $table = 'bahanbaku';

    protected $fillable = [
        'kodebahan',
        'namabahan',
        'stok',
        'satuan',
        'hargabeli'
    ];
}