<?php

namespace Factories;

use Factories\PaymentStrategies\PaymentGateway;

class PaymentGatewayFactory {

    private array $paymentGateways = [];

    public function __construct(PaymentGateway ...$paymentGateways)
    {
        foreach ($paymentGateways as $gateway) {
            $this->paymentGateways[$gateway->name()] = $gateway;
        }
    }
    
    public function create(string $gateway): PaymentGateway
    {
        // return PaymentGateway
        return $this->paymentGateways[$gateway];
    }
}