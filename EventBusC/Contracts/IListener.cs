namespace EventBusC.Contracts
{
    public interface IListener<TEvent> where TEvent : IEvent
    {
        void Handle(TEvent @event);
    }
}
