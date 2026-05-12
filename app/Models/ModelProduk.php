<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelProduk extends Model
{
    protected $table = 'produk';

    // kalau tabel produk kamu tidak ada kolom created_at & updated_at
    public $timestamps = false;

    protected $fillable = [
        'kategoriid',
        'kodeproduk',
        'namaproduk',
        'hargajual',
        'satuan',
        'foto',
        'status',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */
    public function kategori()
    {
        return $this->belongsTo(ModelKategori::class, 'kategoriid', 'id');
    }
}