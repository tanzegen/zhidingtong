<?php
declare(strict_types=1);

namespace Zhidingtong\JsonRpc;


use Hyperf\Contract\ConfigInterface;
use Psr\Container\ContainerInterface;

/**
 * Class NameSpaceLoaderFactory
 * @package Zhidingtong\JsonRpc
 */
class NameSpaceLoaderFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new NameSpaceLoader($container);
    }
}