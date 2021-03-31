<?php


namespace Zhidingtong\JsonRpc\Test;


/**
 * Class NameSpaceMap
 * @package Zhidingtong\JsonRpc\Test
 */
class NameSpaceMap
{
    /**
     * Return service information
     * @return \string[][]
     */
    public function map()
    {
        return [
            [
                // name 需与服务提供者的 name 属性相同
                'name'      => 'CalculatorService',
                // 服务接口名，可选，默认值等于 name 配置的值。
                // 如果 name 直接定义为接口类则可忽略此行配置，如 name 为字符串则需要配置 service 对应到接口类
                'service'   => CalculatorServiceInterface::class,
                // 对应容器对象 ID，可选，默认值等于 service 配置的值，用来定义依赖注入的 key
                'id'        => CalculatorServiceInterface::class,
                // 服务提供者的服务协议，可选，默认值为 jsonrpc-http
                // 可选 jsonrpc-http jsonrpc jsonrpc-tcp-length-check
                'protocol' => 'jsonrpc',
                // 负载均衡算法，可选，默认值为 random
                'load_balancer' => 'random',
            ]
        ];
    }
}