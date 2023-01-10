<?php

namespace He426100\Casbin;

use He426100\Casbin\Listener\OnPipeMessageListener;
use He426100\Casbin\Listener\OnPolicyChangedListener;
use He426100\Casbin\Process\CasbinProcess;
use Casbin\Enforcer;

class ConfigProvider
{

    public function __invoke(): array
    {
        return [
            'dependencies' => [
                Enforcer::class => EnforcerFactory::class,
            ],
            'listeners' => [
                OnPipeMessageListener::class,
                OnPolicyChangedListener::class,
            ],
            'processes' => [
                CasbinProcess::class,
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config for casbin.',
                    'source' => __DIR__ . '/../publish/casbin.php',
                    'destination' => BASE_PATH . '/config/autoload/casbin.php',
                ],
                [
                    'id' => 'model',
                    'description' => 'The model for casbin.',
                    'source' => __DIR__ . '/../publish/casbin-rbac-model.conf',
                    'destination' => BASE_PATH . '/config/autoload/casbin-rbac-model.conf',
                ]
            ],
        ];
    }

}
