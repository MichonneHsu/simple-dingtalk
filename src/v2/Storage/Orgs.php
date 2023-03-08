<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Storage;

use SimpleDingTalk\v2\ApiRequest;
use SimpleDingTalk\v2\Url;
use SimpleDingTalk\Config;

/**
 * 企业管理
 */
class Orgs
{
     /**
     * 获取企业信息
     *
     * @param string $unionId
     * @return mixed
     */
    public static function getOrgInfos(string $unionId)
    {
        $corpId = Config::getCorpId();
        $uri = Url::$api['storage'] . '/orgs/' . $corpId;
        $params = [
            'unionId' => $unionId
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::get($uri);
    }
}