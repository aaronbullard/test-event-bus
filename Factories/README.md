# Factory Test
- Update PaymentGatewayFactory class so that it returns different payment strategies.  Build factory so that new stratgies can be added without changing the class (Open/Closed principle)
- Use Container class for service registration
- Change InMemoryLogger into a singleton using by adding InMemoryLogger::getInstance() method
- Add ability to log all payments using InMemoryLogger class