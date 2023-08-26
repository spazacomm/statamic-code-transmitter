<?php

namespace TimeToDev\CodeTransmitter;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $scripts = [
        __DIR__.'/../public/js/code-transmitter.js',
    ];

    protected $fieldtypes = [
        CodeTransmitter::class,
    ];
}
