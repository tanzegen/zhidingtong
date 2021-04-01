<?php
declare(strict_types=1);

namespace Zhidingtong\Utils\Response\User;


use Zhidingtong\Utils\Response\AbstractResponse;

/**
 * 用户服务返回
 * Class UserResponse
 * @package Zhidingtong\Utils\Response\User
 */
class UserResponse extends AbstractResponse
{
    /**
     * 用户未登录
     */
    const not_login         = 1001;
    /**
     * 用户不存在
     */
    const not_user          = 1002;
    /**
     * 用户在商家下的身份不存在（未在商家下登录过）
     */
    const not_member        = 1003;
    /**
     * 用户被禁用
     */
    const user_disable      = 1004;
    /**
     * 用户在商家下被禁用
     */
    const member_disable    = 1005;
    /**
     * 登录身份不合法
     */
    const invalid_token     = 1006;
    /**
     * 登录过期
     */
    const token_overtime    = 1007;

    /**
     * 状态码映射
     * @var string[]
     */
    public static $map = [
        self::not_login         => '用户未登录',
        self::not_user          => '用户不存在',
        self::not_member        => '用户在商家下的身份不存在',
        self::user_disable      => '用户被禁用',
        self::member_disable    => '用户在商家下被禁用',
        self::invalid_token     => '登录身份不合法',
        self::token_overtime    => '登录过期',
    ];
}