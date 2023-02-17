<?php

return [
    '/' => 'site/index',
    '<action:\w+>' => 'site/<action>',
    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
];