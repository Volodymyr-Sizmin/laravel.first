<?php

namespace App\Helpers\Enums;

enum OrderStatusesEnum: string
{
    case InProgress = "InProgress";
    case Paid = "Paid";
    case Completed = "Completed";
    case Canceled = "Canceled";

    public static function findByKey(string $key){
        return constant("self::$key");
    }
}
