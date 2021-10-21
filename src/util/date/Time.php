<?php
declare(strict_types=1);
namespace SimpleDingTalk\util\date;
use Exception;

use DateTime;
class Time{
    
 

    public $model=null;
    public $date='';
   
    public function __construct()
    {
      
        $date=$this->date;
        $this->model=new DateTime($date);
    }
    public function setDate(string $date){
        $this->date=$date;

        return $this;
    }
 


    public function getDate(string $format){
        return $this->model->format($format);
    }
}