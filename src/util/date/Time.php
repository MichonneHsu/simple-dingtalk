<?php
declare(strict_types=1);
namespace SimpleDingTalk\util\date;
use Exception;

use DateTime;
class Time{
    
 

    public static function setDate(string $date){
       
        
        return new DateTime($date);
    }
 
}