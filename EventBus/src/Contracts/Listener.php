<?php

namespace EventBus\Contracts;

interface Listener {
    
    public function notify(Event $event): self;
    
}