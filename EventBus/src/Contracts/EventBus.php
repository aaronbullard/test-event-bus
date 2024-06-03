<?php

namespace EventBus\Contracts;

interface EventBus {

    public function subscribe(Listener $listener): self;

    public function publish(Event $event): self;
}