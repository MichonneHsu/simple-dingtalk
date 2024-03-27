<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Workbooks;
use SimpleDingTalk\v2\Url;
use SimpleDingTalk\v2\ApiRequest;

/**
 * 工作表
 */
class Sheets
{
    /**
     * 新获取所有工作表
     *
     * @param string $operatorId
     * @param string $workbookId
     * @return mixed
     */
    public static function getAll(string $operatorId, string $workbookId)
    {


        $uri = Url::$api['document']['workbooks']."/$workbookId/sheets";
        $params=[
            'operatorId'=>$operatorId
        ];
        $uri=ApiRequest::joinParams($uri,$params);

        return ApiRequest::get($uri);
    }
    /**
     * 获取工作表
     *
     * @param string $operatorId
     * @param string $workbookId
     * @param string $sheetId
     * @return mixed
     */
    public static function get(string $operatorId, string $workbookId,string $sheetId)
    {


        $uri = Url::$api['document']['workbooks']."/$workbookId/sheets/$sheetId";
     
        $params=[
            'operatorId'=>$operatorId
        ];
        $uri=ApiRequest::joinParams($uri,$params);
        return ApiRequest::get($uri);
    }
    /**
     * 创建工作表
     *
     * @param string $operatorId
     * @param string $workbookId
     * @param array  $body
     * @return mixed
     */
    public static function create(string $operatorId, string $workbookId,array $body)
    {


        $uri = Url::$api['document']['workbooks']."/$workbookId/sheets";
        $params=[
            'operatorId'=>$operatorId
        ];
        $uri=ApiRequest::joinParams($uri,$params);

        return ApiRequest::post($uri,$body);
    }
    /**
     * 删除工作表
     *
     * @param string $operatorId
     * @param string $workbookId
     * @param string $sheetId
     * @return mixed
     */
    public static function remove(string $operatorId, string $workbookId,string $sheetId)
    {


        $uri = Url::$api['document']['workbooks']."/$workbookId/sheets/$sheetId?operatorId=$operatorId";
     

        return ApiRequest::delete($uri);
    }
   
}