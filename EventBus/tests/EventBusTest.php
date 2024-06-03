<?php

namespace EventBus\Tests;

use Mockery;
use EventBus\Contracts\{
    EventBus,
    Listener,
    Event
};
use EventBus\InMemoryEventBus;

class EventBusTest extends BaseTestCase {

    public function setUp(): void
    {
        $this->eventBus = new InMemoryEventBus();
    }

    public function test_it_publishes_events()
    {
        $event = Mockery::mock(Event::class);
        $listener = Mockery::spy(Listener::class);
            
        $this->eventBus->subscribe($listener);

        $bus = $this->eventBus->publish($event);

        $listener->shouldHaveReceived('notify')->with($event)->once();

        $this->assertEquals($bus, $this->eventBus);
    }
}