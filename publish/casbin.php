<?php

return [
    /*
     * Casbin model setting.
     */
    'model' => [
        // Available Settings: "file", "text"
        'config_type' => 'file',
        'config_file_path' => BASE_PATH . '/config/autoload/casbin-rbac-model.conf',
        'config_text' => '',
    ],
    /*
     * Casbin adapter .
     */
    'adapter' => [
        'class' => \He426100\Casbin\Adapters\Mysql\DatabaseAdapter::class,
        'constructor' => [
            'tableName' => 'casbin_rule'
        ],
    ],
    /*
     * Casbin watcher
     */
    'watcher' => [
        'enabled' => false,
        'class' => \He426100\Casbin\Watchers\RedisWatcher::class,
        'constructor' => [
            'channel' => 'casbin'
        ],
    ],
    'log' => [
        'enabled' => false,
    ]
];
