using System;
using System.Collections.Concurrent;
using System.Collections.Generic;
using System.Threading.Tasks;
using EventBusC.Contracts;

namespace EventBusC
{
    public class InMemoryEventBus : IEventBus
    {
        private readonly ConcurrentDictionary<Type, List<object>> _listeners = new();

        public Task PublishAsync<TEvent>(TEvent @event) where TEvent : IEvent
        {
            if (_listeners.TryGetValue(typeof(TEvent), out var listeners))
            {
                foreach (var listener in listeners)
                {
                    ((IListener<TEvent>)listener).Handle(@event);
                }
            }

            return Task.CompletedTask;
        }

        public void Subscribe<TEvent>(IListener<TEvent> listener) where TEvent : IEvent
        {
            var eventType = typeof(TEvent);
            if (!_listeners.ContainsKey(eventType))
            {
                _listeners[eventType] = new List<object>();
            }

            _listeners[eventType].Add(listener);
        }
    }
}
