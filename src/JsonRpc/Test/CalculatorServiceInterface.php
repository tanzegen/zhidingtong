<?php
declare(strict_types=1);

namespace Hyperf\Zhidingtong\JsonRpc\Test;


/**
 * test micro load
 * Interface CalculatorServiceInterface
 * @package Hyperf\Zhidingtong\JsonRpc\Test
 */
interface CalculatorServiceInterface
{
    public function sum(int $v1, int $v2): int;
}