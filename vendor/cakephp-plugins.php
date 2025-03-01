<?php
$baseDir = dirname(dirname(__FILE__));

return [
    'plugins' => [
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'Cake/TwigView' => $baseDir . '/vendor/cakephp/twig-view/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Jlpt' => $baseDir . '/plugins/Jlpt/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'Yeni' => $baseDir . '/plugins/Yeni/',
    ],
];
