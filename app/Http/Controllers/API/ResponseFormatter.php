<?php

/**
 * untuk membuat api mulai dari membuat folder api pada controller kemudian didalamnya buat sebuah file
 * responeseformatter 
 */

//  1. buat sebuah namespace dari file responceformatter
namespace App\Http\Controllers\API;
// 2. buat sebuah kelas
class ResponseFormatter
{
    // mendefinisikan variable response yang didalamnya digunakan untuk menyusun bentuk json
    protected static $response = [
        // struktur dimulai dari meta yang berisi informasi terkait output seperti code, status, dan message
        'meta' => [
            'code' => 200,
            'status' => 'success',
            'message' => null   
        ],
        // struktur ke dua adalah data
        'data' => null
    ];

    // buat function yang akan menampilkan output $response
    public static function success($data=null, $message=null)
    {
        // menyimpan meta dan message ke dalam static response 
        // sef digunakan untuk menggantikan $this karena function yang dibuat bersifat static
        self::$response['meta']['message'] = $message;
        // menyimpan data pada static response data
        self::$response['data'] = $data;

        // gunakan function untuk mengoutputkan json
        return response()->json(self::$response, self::$response['meta']['code']);
    }

    // bila output berupa error
    public static function error($data=null, $message=null, $code=400)
    {
        // menyimpan meta dan message ke dalam static response 
        // sef digunakan untuk menggantikan $this karena function yang dibuat bersifat static
        self::$response['meta']['status'] = 'error';
        self::$response['meta']['code'] = $code;
        self::$response['meta']['message'] = $message;
        self::$response['meta']['data'] = $data;

        // gunakan function untuk mengoutputkan json
        return response()->json(self::$response, self::$response['meta']['code']);
    }

}