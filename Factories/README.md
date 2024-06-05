# Factory Test
- Change InMemoryLogger into a singleton by adding InMemoryLogger::getInstance() method
- Update PaymentGatewayFactory class so that it returns different payment strategies.  Build factory so that new stratgies can be added without changing the class (Open/Closed principle)
- Use Container class for service registration
- Add ability to log all payments using InMemoryLogger class.  Each transaction should append to the log the statement below:

``` Payment made for account {accountId} with amount {amount} by {stripe|square} ```