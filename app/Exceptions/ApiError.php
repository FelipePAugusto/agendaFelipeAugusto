<?php
/**
 * Created by PhpStorm.
 * User: felipe.augusto
 * Date: 16/07/2019
 * Time: 18:21
 */

namespace App\Exceptions;


class ApiError
{
    public static function errorMessage($message, $code){
        return [
            'data' => [
                'msg' => $message,
                'code' => $code
            ]
        ];
    }
}