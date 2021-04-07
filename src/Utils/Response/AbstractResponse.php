<?php
declare(strict_types=1);

namespace Zhidingtong\Utils\Response;


use Hyperf\Utils\ApplicationContext;
use Hyperf\HttpServer\Contract\ResponseInterface;

/**
 * 所有服务下的状态码类必须继承该抽象类。
 * FIXME: 状态码约定：
 * 1.各服务下状态码为四位int类型数值。
 * 2.不同服务应该有不同状态码开头。
 * 3.所有返回都应该有状态码且需出自本状态码返回包。
 * Class AbstractResponse
 * @package Zhidingtong\Utils\Response
 */
abstract class AbstractResponse
{
    /**
     * 无效的code码
     */
    const code_invalid  = -99999;

    public static $map = [
        self::code_invalid  => '未定义的状态码',
    ];

    /**
     * 状态码是否存在
     * @param int $code
     * @return bool
     */
    public static function codeExits(int $code): bool
    {
        return isset(static::$map[$code]);
    }

    /**
     * 获取状态码对应的描述值
     * @param int $code
     * @return string
     */
    public static function getMsg(int $code): string
    {
        return static::$map[$code];
    }

    /**
     * json返回
     * @param int $code
     * @param string $msg
     * @param array $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function json(int $code, string $msg = '', array $data = [])
    {
        if (!static::codeExits($code)) {
            $code = self::code_invalid;
            $msg = self::$map[$code];
        }
        if (empty($msg)) {
            $msg = static::getMsg($code);
        }
        $response = ApplicationContext::getContainer()->get(ResponseInterface::class);
        return $response->json([
            'code'  => $code,
            'msg'   => $msg,
            'data'  => $data
        ]);
    }
}