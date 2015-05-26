Feature: Using the Ticket SDK with the Kayako API

  Scenario: Get a Ticket by ID
    Given I am authenticated
    When I request a ticket by ID "ABC-123-4567"
    Then I should receive the ticket
    And the ticket ID should match
