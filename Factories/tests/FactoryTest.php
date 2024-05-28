<?php

namespace Factories\Tests;

use Factories\Container;
use Factories\InMemoryLogger;
use Factories\AppServiceProvider;
use Factories\PaymentGatewayFactory;
use Factories\PaymentStrategies\{
    PaymentGateway,
    SquarePaymentGateway, 
    StripePaymentGateway
};

class FactoryTest extends BaseTestCase {

    public function setUp(): void
    {
        $this->container = Container::getInstance();
        
        $serviceProvider = new AppServiceProvider($this->container);

        $serviceProvider->register();

        $this->factory = $this->container->make(PaymentGatewayFactory::class);
    }
    
    public function test_create_payment_gateway() 
    {
        foreach(['stripe', 'square'] as $gateway) {
            $pmtGateway = $this->factory->create($gateway);

            $this->assertInstanceOf(PaymentGateway::class, $pmtGateway);
        }
    }

    public function test_create_payment_gateway_with_decorator()
    {
        foreach(['stripe', 'square'] as $gateway) {
            $pmtGateway = $this->factory->create($gateway);

            $pmtGateway->pay(1, 100);
        }

        $logger = $this->container->make(InMemoryLogger::class);

        $this->assertEquals($logger->getLogs(), [
            "Payment made for account 1 with amount 100 by stripe",
            "Payment made for account 1 with amount 100 by square"
        ]);
    }
}