<?php


namespace Zhidingtong\JsonRpc;


use Hyperf\Contract\ConfigInterface;
use RuntimeException;

/**
 * Class NameSpaceLoader
 * @package Zhidingtong\JsonRpc
 */
class NameSpaceLoader
{
    /**
     * @var ConfigInterface
     */
    public $config;

    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * get micro service by your local config
     * @return array
     */
    public function getLoader(): array
    {
        $key = $this->config->get('zhidingtong.micro_use', '');
        $keyArr = explode(',', $key);
        $res = [];
        if (empty($keyArr)) {
            return $res;
        }
        foreach ($keyArr as $k => $v) {
            $res = array_merge($res, $this->load($v));
        }
        return $res;
    }

    /**
     * load service info by define
     * @param string $v
     * @return array
     */
    public function load(string $v): array
    {
        $res = [];
        switch (strtolower($v)) {
            case '':
                break;
            case 'test':
                $class = new namespace\Test\NameSpaceMap();
                $res = $class->map();
                break;
            default:
                throw new RuntimeException(sprintf('Zhidingtong Micro %s is not defined.', $v));
        }
        return $res;
    }
}