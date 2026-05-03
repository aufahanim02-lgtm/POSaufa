<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class namaseedercafeposraihan extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | USER (OWNER, MANAGER, KASIR)
        |--------------------------------------------------------------------------
        */
        DB::table('user')->insert([
            [
                'name' => 'Owner Cafe',
                'username' => 'owner',
                'email' => 'owner@cafepos.com',
                'password' => Hash::make('123456'),
                'role' => 'owner',
                'foto' => null,
                'isactive' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Manager Cafe',
                'username' => 'manager',
                'email' => 'manager@cafepos.com',
                'password' => Hash::make('123456'),
                'role' => 'manager',
                'foto' => null,
                'isactive' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kasir Cafe',
                'username' => 'kasir',
                'email' => 'kasir@cafepos.com',
                'password' => Hash::make('123456'),
                'role' => 'kasir',
                'foto' => null,
                'isactive' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | KATEGORI
        |--------------------------------------------------------------------------
        */
        DB::table('kategori')->insert([
            [
                'namakategori' => 'Minuman',
                'deskripsi' => 'Kategori minuman dingin dan panas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namakategori' => 'Makanan',
                'deskripsi' => 'Kategori makanan berat dan ringan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namakategori' => 'Snack',
                'deskripsi' => 'Kategori cemilan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | PRODUK
        |--------------------------------------------------------------------------
        */
        DB::table('produk')->insert([
            [
                'kategoriid' => 1,
                'kodeproduk' => 'PRD001',
                'namaproduk' => 'Es Teh Manis',
                'hargajual' => 5000,
                'satuan' => 'Gelas',
                'foto' => null,
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategoriid' => 1,
                'kodeproduk' => 'PRD002',
                'namaproduk' => 'Kopi Hitam',
                'hargajual' => 8000,
                'satuan' => 'Cangkir',
                'foto' => null,
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategoriid' => 2,
                'kodeproduk' => 'PRD003',
                'namaproduk' => 'Nasi Goreng',
                'hargajual' => 15000,
                'satuan' => 'Porsi',
                'foto' => null,
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategoriid' => 3,
                'kodeproduk' => 'PRD004',
                'namaproduk' => 'Kentang Goreng',
                'hargajual' => 12000,
                'satuan' => 'Porsi',
                'foto' => null,
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | MEJA
        |--------------------------------------------------------------------------
        */
        DB::table('meja')->insert([
            [
                'nomormeja' => 'M01',
                'kapasitas' => 4,
                'status' => 'kosong',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomormeja' => 'M02',
                'kapasitas' => 2,
                'status' => 'kosong',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomormeja' => 'M03',
                'kapasitas' => 6,
                'status' => 'kosong',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | METODE PEMBAYARAN
        |--------------------------------------------------------------------------
        */
        DB::table('metodepembayaran')->insert([
            [
                'namametode' => 'Tunai',
                'jenis' => 'cash',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namametode' => 'QRIS',
                'jenis' => 'noncash',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namametode' => 'Debit BCA',
                'jenis' => 'noncash',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | PAJAK
        |--------------------------------------------------------------------------
        */
        DB::table('pajak')->insert([
            [
                'namapajak' => 'PPN 11%',
                'persen' => 11,
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | PROMO
        |--------------------------------------------------------------------------
        */
        DB::table('promo')->insert([
            [
                'namapromo' => 'Diskon 10%',
                'jenis' => 'persen',
                'nilaidiskon' => 10,
                'minimalbelanja' => 20000,
                'tanggalmulai' => now()->toDateString(),
                'tanggalselesai' => now()->addDays(30)->toDateString(),
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namapromo' => 'Potongan 5000',
                'jenis' => 'fixed',
                'nilaidiskon' => 5000,
                'minimalbelanja' => 30000,
                'tanggalmulai' => now()->toDateString(),
                'tanggalselesai' => now()->addDays(15)->toDateString(),
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | SUPPLIER
        |--------------------------------------------------------------------------
        */
        DB::table('supplier')->insert([
            [
                'namasupplier' => 'Supplier Utama',
                'nohp' => '081234567890',
                'alamat' => 'Jl. Supplier No.1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namasupplier' => 'Supplier Cadangan',
                'nohp' => '082345678901',
                'alamat' => 'Jl. Supplier No.2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | BAHAN BAKU
        |--------------------------------------------------------------------------
        */
        DB::table('bahanbaku')->insert([
            [
                'kodebahan' => 'BB001',
                'namabahan' => 'Gula',
                'stok' => 50,
                'satuan' => 'Kg',
                'hargabeli' => 12000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodebahan' => 'BB002',
                'namabahan' => 'Kopi Bubuk',
                'stok' => 20,
                'satuan' => 'Kg',
                'hargabeli' => 80000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kodebahan' => 'BB003',
                'namabahan' => 'Beras',
                'stok' => 30,
                'satuan' => 'Kg',
                'hargabeli' => 15000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | STOK
        |--------------------------------------------------------------------------
        */
        DB::table('stok')->insert([
            [
                'bahanbakuid' => 1,
                'stoktersedia' => 50,
                'stokminimal' => 10,
                'status' => 'aman',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bahanbakuid' => 2,
                'stoktersedia' => 20,
                'stokminimal' => 5,
                'status' => 'aman',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bahanbakuid' => 3,
                'stoktersedia' => 30,
                'stokminimal' => 10,
                'status' => 'aman',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | LANDING HOME
        |--------------------------------------------------------------------------
        */
        DB::table('home')->insert([
            [
                'title' => 'CAFEPOS - Aplikasi Kasir Cafe Modern',
                'content' => 'Kelola transaksi, stok bahan baku, laporan penjualan, dan shift kasir dengan cepat dan profesional.',
                'statusaktif' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | TENTANG
        |--------------------------------------------------------------------------
        */
        DB::table('tentang')->insert([
            [
                'title' => 'Tentang CAFEPOS',
                'content' => 'CAFEPOS adalah aplikasi kasir cafe yang dibuat untuk membantu bisnis cafe dan restoran modern.',
                'statusaktif' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}