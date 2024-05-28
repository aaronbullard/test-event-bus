<?php

namespace Factories\Tests;

use Factories\Container;
use Factories\AppServiceProvider;
use Factories\PaymentGatewayFactory;

class FactoryTest extends BaseTestCase {

    public function setUp(): void
    {
        $this->container = Container::getInstance();
        
        $serviceProvider = new AppServiceProvider($this->container);

        $serviceProvider->register();

        $this->factory = $this->container->make(PaymenGatewayFactory::class);
    }
    
    public function test_create_payment_gateway() 
    {
        foreach(['stripe', 'square'] as $gateway) {
            $pmtGateway = $this->factory->create($gateway);

            $this->assertInstanceOf(PaymentInterface::class, $pmtGateway);
        }
    }
}