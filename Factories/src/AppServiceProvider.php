<?php

namespace Factories;

use Factories\InMemoryLogger;
use Factories\PaymentStrategies\{
    StripePaymentGateway, 
    SquarePaymentGateway,
    LoggingPaymentGatewayDecorator
};

class AppServiceProvider {

    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function register() {
        // Register services to Container, change as needed
        $this->container->bind(InMemoryLogger::class, function($app){
            return new InMemoryLogger();
        });

        $this->container->bind(StripePaymentGateway::class, function($app) {
            return new StripePaymentGateway();
        });

        $this->container->bind(SquarePaymentGateway::class, function($app) {
           return new SquarePaymentGateway(); 
        });
        
        $this->container->bind(PaymentGatewayFactory::class, function($app){
            return new PaymentGatewayFactory();
        });
    }

}