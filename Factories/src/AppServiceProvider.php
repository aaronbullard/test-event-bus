<?php

namespace Factories;

class AppServiceProvider {

    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function register() {
        // Register Factory to Container

    }

}