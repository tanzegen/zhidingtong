<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace Zhidingtong;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
            ],
            'commands' => [
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            // FIXME: 目前 hyperf 由于配置加载问题，配置发布暂时无法生效。
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'main config by this package', // 描述
                    // 建议默认配置放在 publish 文件夹中，文件命名和组件名称相同
                    'source' => __DIR__ . '/../publish/zhidingtong.php',  // 对应的配置文件路径
                    'destination' => BASE_PATH . '/config/autoload/zhidingtong.php', // 复制为这个路径下的该文件
                ]
            ]
        ];
    }
}
