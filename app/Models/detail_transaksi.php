<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    use HasFactory;
    protected $table = 'detail_transaksis';
    public $timestamps = true;
    protected $fillable = [
        'id_transaksi',
        'id_product',
        'qty',
        'price',
        'status',
    ];


    public function product()
    {
        return $this->hasOne(product::class, 'id_product', 'id');
    }
}
