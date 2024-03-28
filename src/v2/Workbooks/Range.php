<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Workbooks;
use SimpleDingTalk\v2\Url;
use SimpleDingTalk\v2\ApiRequest;

/**
 * 单元格区域
 */
class Range
{
    /**
     * 获取单元格区域
     *
     * @param string $operatorId
     * @param string $workbookId
     * @param string $sheetId
     * @param string $rangeAddress
     * @param string $select
     * @return mixed
     */
    public static function select(string $operatorId, string $workbookId,string $sheetId ,string $rangeAddress,string $select)
    {


        $uri = Url::$api['document']['workbooks']."/$workbookId/sheets/$sheetId/ranges/$rangeAddress";
        $params=[
            'select'=>$select,
            'operatorId'=>$operatorId
        ];
        $uri=ApiRequest::joinParams($uri,$params);

        return ApiRequest::get($uri);
    }
     /**
     * 更新单元格区域
     *
     * @param string $operatorId
     * @param string $workbookId
     * @param string $sheetId
     * @param string $rangeAddress
     * @param string $select
     * @return mixed
     */
    public static function update(string $operatorId, string $workbookId,string $sheetId ,string $rangeAddress,array $body)
    {


        $uri = Url::$api['document']['workbooks']."/$workbookId/sheets/$sheetId/ranges/$rangeAddress";
        $params=[
            'operatorId'=>$operatorId
        ];
        $uri=ApiRequest::joinParams($uri,$params);

        return ApiRequest::put($uri,$body);
    }
     /**
     * 清除单元格区域内数据
     *
     * @param string $operatorId
     * @param string $workbookId
     * @param string $sheetId
     * @param string $rangeAddress
     * @param string $select
     * @return mixed
     */
    public static function clearData(string $operatorId, string $workbookId,string $sheetId ,string $rangeAddress)
    {


        $uri = Url::$api['document']['workbooks']."/$workbookId/sheets/$sheetId/ranges/$rangeAddress/clearData";
        $params=[
            'operatorId'=>$operatorId
        ];
        $uri=ApiRequest::joinParams($uri,$params);

        return ApiRequest::post($uri);
    }
     /**
     * 清除单元格区域内所有内容
     *
     * @param string $operatorId
     * @param string $workbookId
     * @param string $sheetId
     * @param string $rangeAddress
     * @param string $select
     * @return mixed
     */
    public static function clear(string $operatorId, string $workbookId,string $sheetId ,string $rangeAddress)
    {


        $uri = Url::$api['document']['workbooks']."/$workbookId/sheets/$sheetId/ranges/$rangeAddress/clear";
        $params=[
            'operatorId'=>$operatorId
        ];
        $uri=ApiRequest::joinParams($uri,$params);

        return ApiRequest::post($uri);
    }
}