<?php
declare(strict_types=1);

namespace Zhidingtong\Utils\Response;

/**
 * 通用返回码
 * 复杂请求或需要前端甄别的请求一定要单独定义状态码，不可使用本类下的成功/失败统一状态码。
 * Class MainResponse
 * @package Zhidingtong\Utils\Response
 */
class MainResponse extends AbstractResponse
{
    /**
     * 返回成功
     */
    const success       = 200;

    /**
     * 返回失败
     */
    const fail          = 500;

    public static $map = [
        self::success       => 'ok',
        self::fail          => 'fail'
    ];
}