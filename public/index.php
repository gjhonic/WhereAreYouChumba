<?php
if (!file_exists(__DIR__ . '/../.env')) {
    echo '<strong>Error</strong>: Create file <strong>.env</strong> in root path';
    die(0);
}
require(__DIR__ . '/../.env');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require(__DIR__ . '/../app/config/web.php');

(new yii\web\Application($config))->run();