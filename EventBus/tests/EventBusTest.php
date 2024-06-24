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
        $listener1 = Mockery::spy(Listener::class);
        $listener2 = Mockery::spy(Listener::class);

        $bus = $this->eventBus
                    ->subscribe($listener1)
                    ->subscribe($listener2)
                    ->publish($event);

        $listener1->shouldHaveReceived('notify')->with($event)->once();
        $listener2->shouldHaveReceived('notify')->with($event)->once();

        $this->assertEquals($bus, $this->eventBus);
    }
}