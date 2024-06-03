<?php

namespace EventBus\Contracts;

abstract class Event {

    final public function name(): string
    {
        return get_class($this);
    }
}