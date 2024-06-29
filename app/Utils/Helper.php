<?php

namespace App\Utils;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Helper
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
    }

    public static function ResponseAPI(array|string $message = null, mixed $data = null, int $status = 200)
    {
        $response = [];
        $response['status'] = $status;
        $response['message'] = $message;
        $response['data'] = $data;

        return response()->json(['message' => $response['message'], 'data' => $response['data']], $status);
    }

    public static function AuthUserId()
    {
        return Auth::guard('api')->user()->id;
    }

    public static function isDataExistent(string $table, array $data)
    {
        $resultData = DB::table($table)->where($data)->first();
        return ($resultData ? true : false);
    }
}
