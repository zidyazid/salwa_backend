<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'products_id',
        'photo',
        'is_default'
    ];

    protected $hidden = [

    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }

    
     public function getPhotoAttribute($value)
     {
         return url('storage/' . $value);
     }

     

































     /**
     * kemudian buat sebuat function yang berfungsi untuk menghandle url yang akan digunakan pada api
     * caranya dengan menggunakan accessor, function sperti ini memiliki aturan penamaan
     * yaitu harus dimulai dengan get kemudian nama kolom pada database lalu
     * ditambah atribut contoh: getPhotoAttribut
     */
    }
