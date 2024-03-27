<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Workbooks;
use SimpleDingTalk\v2\Url;
use SimpleDingTalk\v2\ApiRequest;

/**
 * 行列
 */
class Rows
{
     /**
     * 指定行上方插入若干行
     *
     * @param string $operatorId
     * @param string $workbookId
     * @param string $sheetId
     * @param array  $body
     * @return mixed
     */
    public static function insertRowsBefore(string $operatorId, string $workbookId,string $sheetId ,array $body)
    {


        $uri = Url::$api['document']['workbooks']."/$workbookId/sheets/$sheetId/insertRowsBefore";
        $params=[
            'operatorId'=>$operatorId
        ];
        $uri=ApiRequest::joinParams($uri,$params);

        return ApiRequest::post($uri,$body);
    }
     /**
     * 指定列左侧插入若干列
     *
     * @param string $operatorId
     * @param string $workbookId
     * @param string $sheetId
     * @param array  $body
     * @return mixed
     */
    public static function insertColumnsBefore(string $operatorId, string $workbookId,string $sheetId ,array $body)
    {


        $uri = Url::$api['document']['workbooks']."/$workbookId/sheets/$sheetId/insertColumnsBefore";
        $params=[
            'operatorId'=>$operatorId
        ];
        $uri=ApiRequest::joinParams($uri,$params);

        return ApiRequest::post($uri,$body);
    }
    /**
     * 删除行
     *
     * @param string $operatorId
     * @param string $workbookId
     * @param string $sheetId
     * @param array  $body
     * @return mixed
     */
    public static function deleteRows(string $operatorId, string $workbookId,string $sheetId ,array $body)
    {


        $uri = Url::$api['document']['workbooks']."/$workbookId/sheets/$sheetId/deleteRows";
        $params=[
            'operatorId'=>$operatorId
        ];
        $uri=ApiRequest::joinParams($uri,$params);

        return ApiRequest::post($uri,$body);
    }
     /**
     * 删除列
     *
     * @param string $operatorId
     * @param string $workbookId
     * @param string $sheetId
     * @param array  $body
     * @return mixed
     */
    public static function deleteColumns(string $operatorId, string $workbookId,string $sheetId ,array $body)
    {


        $uri = Url::$api['document']['workbooks']."/$workbookId/sheets/$sheetId/deleteColumns";
        $params=[
            'operatorId'=>$operatorId
        ];
        $uri=ApiRequest::joinParams($uri,$params);

        return ApiRequest::post($uri,$body);
    }
     /**
     * 设置行隐藏或显示
     *
     * @param string $operatorId
     * @param string $workbookId
     * @param string $sheetId
     * @param array  $body
     * @return mixed
     */
    public static function setRowsVisibility(string $operatorId, string $workbookId,string $sheetId ,array $body)
    {


        $uri = Url::$api['document']['workbooks']."/$workbookId/sheets/$sheetId/setRowsVisibility";
        $params=[
            'operatorId'=>$operatorId
        ];
        $uri=ApiRequest::joinParams($uri,$params);

        return ApiRequest::post($uri,$body);
    }
    /**
     * 设设置列隐藏或显示
     *
     * @param string $operatorId
     * @param string $workbookId
     * @param string $sheetId
     * @param array  $body
     * @return mixed
     */
    public static function setColumnsVisibility(string $operatorId, string $workbookId,string $sheetId ,array $body)
    {


        $uri = Url::$api['document']['workbooks']."/$workbookId/sheets/$sheetId/setColumnsVisibility";
        $params=[
            'operatorId'=>$operatorId
        ];
        $uri=ApiRequest::joinParams($uri,$params);

        return ApiRequest::post($uri,$body);
    }
}