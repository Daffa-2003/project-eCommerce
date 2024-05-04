<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_cart extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'idUser',
        'id_product',
        'qty',
        'price',
        'status'
    ];

    public function product()
    {
        return $this->hasOne(product::class, 'id', 'id_product');
    }
}
