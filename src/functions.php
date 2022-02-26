<?php
declare(strict_types=1);

use SimpleDingTalk\Config;


if(!function_exists('dk_conf')){
    function dk_conf(string $name){
        $path=explode('.',$name);
        $config=Config::getApp();
        foreach ($path as $val) {
            if (isset($config[$val])) {
                $config = $config[$val];
            }
        }
        return $config;
    }
}
