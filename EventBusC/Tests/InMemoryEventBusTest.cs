using System.Threading.Tasks;
using EventBusC.Contracts;
using NUnit.Framework;

namespace EventBusC.Tests
{
    public class InMemoryEventBusTest : BaseTestCase
    {
        private InMemoryEventBus _eventBus;

        [SetUp]
        public void Init()
        {
            _eventBus = new InMemoryEventBus();
        }

        [Test]
        public async Task Publish_ShouldNotifySubscribedListeners()
        {
            // Arrange
            var testEvent = new TestEvent { Message = "Hello, World!" };
            var listener = new TestListener();
            _eventBus.Subscribe(listener);

            // Act
            await _eventBus.PublishAsync(testEvent);

            // Assert
            Assert.AreEqual("Hello, World!", listener.ReceivedMessage);
        }

        private class TestEvent : IEvent
        {
            public string Message { get; set; }
        }

        private class TestListener : IListener<TestEvent>
        {
            public string ReceivedMessage { get; private set; }

            public void Handle(TestEvent @event)
            {
                ReceivedMessage = @event.Message;
            }
        }
    }
}
