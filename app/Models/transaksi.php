<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    public $timestamps = true;
    protected $fillable = [
        'code_transaksi',
        'sku_transaksi',
        'total_qty',
        'total_harga',
        'nama_pembeli',
        'alamat',
        'no_tlp',
        'ekspedisi',
        'ongkir',
        'bayar',
        'kembali',
    ];
    protected $hidden = [];
}
