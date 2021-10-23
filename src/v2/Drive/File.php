<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Drive;
use SimpleDingTalk\v2\apiRequest;
use SimpleDingTalk\v2\Url;
/**
 * 钉盘
 */
class File
{
   

    public static function get_list(string $unionId, string $spaceId,string $parentId,string $maxResults,string $orderType='createTimeDesc',string $nextToken='')
    {
        $uri = Url::$api['drive'].$spaceId.'/files';

        $params = [
            'unionId' => $unionId,
            'parentId'=>$parentId,
            'maxResults'=>$maxResults,
            'orderType'=>$orderType,
            'nextToken'=>$nextToken
        ];
        $uri = apiRequest::joinParams($uri, $params);
        return apiRequest::get($uri);
    }


}
