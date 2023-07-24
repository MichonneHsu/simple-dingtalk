<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Storage;

use SimpleDingTalk\v2\ApiRequest;
use SimpleDingTalk\v2\Url;
use SimpleDingTalk\Config;
/**
 * 回收站管理
 */
class RecycleBins{
    /**
     * 获取回收站信息
     *
     * @param array $params
     * @return mixed
     */
    public static function getInfo(array $params){
        $uri = Url::$api['storage'] . '/recycleBins';
       
        $uri = ApiRequest::joinParams($uri, $params);

        return ApiRequest::get($uri);
    }
    /**
     * 获取回收项列表
     *
     * @param string $recycleBinId
     * @param array $params
     * @return void
     */
    public static function getList(string $recycleBinId,array $params){
        $uri = Url::$api['storage'] . "/recycleBins/$recycleBinId/recycleItems";
       
        $uri = ApiRequest::joinParams($uri, $params);

        return ApiRequest::get($uri);
    }
    /**
     * 获取回收项信息
     *
     * @param string $recycleBinId
     * @param string $recycleItemId
     * @param string $unionId
     * @return void
     */
    public static function getItem(string $recycleBinId,string $recycleItemId,string $unionId){
        $uri = Url::$api['storage'] . "/recycleBins/$recycleBinId/recycleItems/$recycleItemId?unionId=$unionId";

        return ApiRequest::get($uri);
    }
    /**
     * 还原回收项
     *
     * @param string $recycleBinId
     * @param string $recycleItemId
     * @param string $unionId
     * @param array $body
     * @return void
     */
    public static function getItems(string $recycleBinId,string $recycleItemId,string $unionId ,array $body){
        $uri = Url::$api['storage'] . "/recycleBins/$recycleBinId/recycleItems/$recycleItemId?unionId=$unionId";

        return ApiRequest::post($uri,$body);
    }

    /**
     * 批量还原回收项
     *
     * @param string $recycleBinId
     * @param string $unionId
     * @param array $body
     * @return void
     */
    public static function batchRestore(string $recycleBinId,string $unionId,array $body){
        $uri = Url::$api['storage'] . "/recycleBins/$recycleBinId/recycleItems/batchRestore?unionId=$unionId";

        return ApiRequest::post($uri,$body);
    }
    /**
     * 删除回收项
     *
     * @param string $recycleBinId
     * @param string $recycleItemId
     * @param string $unionId
     * @return void
     */
    public static function remove(string $recycleBinId,string $recycleItemId,string $unionId){
        $uri = Url::$api['storage'] . "/recycleBins/$recycleBinId/recycleItems/$recycleItemId?unionId=$unionId";

        return ApiRequest::delete($uri);
    }
    /**
     * 批量删除回收项
     *
     * @param string $recycleBinId
     * @param string $unionId
     * @param array $body
     * @return void
     */
    public static function batchRemove(string $recycleBinId,string $unionId,array $body){
        $uri = Url::$api['storage'] . "/recycleBins/$recycleBinId/recycleItems/batchRemove?unionId=$unionId";

        return ApiRequest::post($uri,$body);
    }


    public static function clear(string $recycleBinId,string $unionId){
        $uri = Url::$api['storage'] . "/recycleBins/$recycleBinId/clear?unionId=$unionId";

        return ApiRequest::post($uri);
    }
    
}