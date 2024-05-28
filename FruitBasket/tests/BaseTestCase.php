<?php

namespace Tests;

use Mockery;
use PHPUnit\Framework\TestCase;

class BaseTestCase extends TestCase {

    public function tearDown(): void {
        parent::tearDown();
        Mockery::close();
    }
}