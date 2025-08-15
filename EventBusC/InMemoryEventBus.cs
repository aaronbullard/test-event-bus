using System;
using System.Collections.Concurrent;
using System.Collections.Generic;
using System.Threading.Tasks;
using EventBusC.Contracts;

namespace EventBusC
{
    public class InMemoryEventBus : IEventBus
    {
        public Task PublishAsync<TEvent>(TEvent @event) where TEvent : IEvent
        {

        }

        public void Subscribe<TEvent>(IListener<TEvent> listener) where TEvent : IEvent
        {

        }
    }
}
