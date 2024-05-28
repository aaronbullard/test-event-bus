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
        // Register Factory to Container
        $this->container->bind(InMemoryLogger::class, function($app){
            return InMemoryLogger::getInstance();
        });

        $this->container->bind(StripePaymentGateway::class, function($app) {
            return new StripePaymentGateway();
        });

        $this->container->bind(SquarePaymentGateway::class, function($app) {
           return new SquarePaymentGateway(); 
        });
        
        $this->container->bind(PaymentGatewayFactory::class, function($app){
            return new PaymentGatewayFactory(
                $app->make(StripePaymentGateway::class),
                $app->make(SquarePaymentGateway::class)
            );
        });

        $this->container->bind(PaymentGatewayFactory::class, function($app){
            return new PaymentGatewayFactory(
                new LoggingPaymentGatewayDecorator(
                    $app->make(StripePaymentGateway::class),
                    $app->make(InMemoryLogger::class)
                ),
                new LoggingPaymentGatewayDecorator(
                    $app->make(SquarePaymentGateway::class),
                    $app->make(InMemoryLogger::class)
                )
            );
        });
    }

}