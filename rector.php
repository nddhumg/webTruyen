<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\ValueObject\MethodCallRename;


return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__.'/app',
        __DIR__.'/routes',
        __DIR__.'/resources',
        //  __DIR__ . '/app/Http/Controllers',
    ]);

    // $rectorConfig->ruleWithConfiguration(RenameClassRector::class, [
    //     'App\\Http\\Controllers\\UserController' => 'MyController12',
    // ]);
    $rectorConfig->ruleWithConfiguration(RenameMethodRector::class, [
        //  new MethodCallRename(
        //     'App\\Http\\Controllers\\UserController', // class cũ
        //     'showInfo',                               // method cũ
        //     'showUserInfo'                            // method mới
        // ),
        // new MethodCallRename(
        //     'App\\Http\\Controllers\\UserController',
        //     'update',
        //     'updateUser'
        // ),
        new MethodCallRename(
            'App\\Http\\Controllers\\CommicsController', // class cũ
            'createfrom',                               // method cũ
            'createfrom1'                            // method mới
        ),
    ]);
};
