<?php
declare(strict_types=1);
namespace SimpleDingTalk\util\date;
use Exception;

use DateTime;
class Time{
    
 

   
    public static function getDate(string $date)
    {
        return new DateTime($date);
    }
    public static function get_calandar_date(string $startTime,string $endTime){
        
        return [
            'startTime'=>self::getDate($startTime)->format('c'),
            'endTime'=>self::getDate($endTime)->format('c'),
        ];
    }
}