<?php

namespace EventBus;

use EventBus\Contracts\{
    EventBus,
    Listener,
    Event
};

class InMemoryEventBus implements EventBus {

    private array $listeners = [];

    public function subscribe(Listener $listener): self
    {
        $this->listeners[] = $listener;

        return $this;
    }

    public function publish(Event $event): self
    {
        foreach ($this->listeners as $listener) {
            $listener->notify($event);
        }

        return $this;
    }
}