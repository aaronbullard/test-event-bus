using NUnit.Framework;

namespace EventBusC.Tests
{
    public abstract class BaseTestCase
    {
        [SetUp]
        public void SetUp()
        {
            // Common setup logic for tests
        }

        [TearDown]
        public void TearDown()
        {
            // Common teardown logic for tests
        }
    }
}
