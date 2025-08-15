using System.Threading.Tasks;

namespace EventBusC.Contracts
{
    public interface IEventBus
    {
        Task PublishAsync<TEvent>(TEvent @event) where TEvent : IEvent;
        void Subscribe<TEvent>(IListener<TEvent> listener) where TEvent : IEvent;
    }
}
