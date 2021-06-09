<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'description',
        'price',
        'quantity'
    ];

    protected $hidden = [

    ];

    // function untuk menyambungkan dengan table relasi
    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'products_id');
    }

    /**
     * kemudian buat sebuat function yang berfungsi untuk menghandle url yang akan digunakan pada api
     * caranya dengan menggunakan accessor, function sperti ini memiliki aturan penamaan
     * yaitu harus dimulai dengan get kemudian nama kolom pada database lalu
     * ditambah atribut contoh: getPhotoAttribut
     */



}
