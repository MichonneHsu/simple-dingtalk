<?php
declare(strict_types=1);
namespace SimpleDingTalk\util\date;
use Exception;

use DateTime;
class Time{
    
 

    public static function setDate(string $date){
        return new DateTime($date);
    }


    public static function toTime(string $date,bool $isMilisecond=false){
        if($isMilisecond){
            return strtotime($date)*100;
        }else{
            return strtotime($date);
        }
    }
 
}