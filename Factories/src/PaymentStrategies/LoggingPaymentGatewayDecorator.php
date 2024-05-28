<?php

namespace Factories\PaymentStrategies;

use Factories\InMemoryLogger;

class LoggingPaymentGatewayDecorator extends PaymentGateway {

    private PaymentGateway $paymentGateway;

    private InMemoryLogger $logger;

    public function __construct(PaymentGateway $paymentGateway, InMemoryLogger $logger)
    {
        $this->paymentGateway = $paymentGateway;
        $this->logger = $logger;
    }

    public function name(): string
    {
        return $this->paymentGateway->name();
    }

    public function pay(int $accountId, int $amount): array {
        $result = $this->paymentGateway->pay($accountId, $amount);
        
        $this->logger->log(sprintf("Payment made for account %d with amount %d by %s", $accountId, $amount, $this->paymentGateway->name()));

        return $result;
    }
}