| --- | master | develop | feature |
| --- | ------ | ------- | ------- |
| build | --- | --- | [![Build Status](https://travis-ci.org/eddiejaoude/kayako-api-sdk.svg?branch=feature%2F1-get-ticket)](https://travis-ci.org/eddiejaoude/kayako-api-sdk) |
| Scrutinizer | --- | --- | [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/eddiejaoude/kayako-api-sdk/badges/quality-score.png?b=feature%2F1-get-ticket)](https://scrutinizer-ci.com/g/eddiejaoude/kayako-api-sdk/?branch=feature%2F1-get-ticket) |
| Coverage | --- | --- | [![Code Coverage](https://scrutinizer-ci.com/g/eddiejaoude/kayako-api-sdk/badges/coverage.png?b=feature%2F1-get-ticket)](https://scrutinizer-ci.com/g/eddiejaoude/kayako-api-sdk/?branch=feature%2F1-get-ticket) |
| Dashboard | --- | --- | [![DashboardHub Badge](http://dashboardhub.io/badge/5563ffdabbf0d1.00515209 "DashboardHub Badge")](http://dashboardhub.io/d/5563ffdabbf0d1.00515209) |
| Version Eye | --- | --- | [![Dependency Status](https://www.versioneye.com/user/projects/556403433637640016f80100/badge.svg?style=flat)](https://www.versioneye.com/user/projects/556403433637640016f80100) |

# Kayako - PHP SDK

For Kayako 'Helpdesk Evolved' API

> Simple customer service software that scales with your business.
> Kayako makes it easy to deliver an unrivalled customer support experience.

## The focus of this library is:

* Separation of concerns & Single responsibility principles
* TDD / BDD Test automation with PHPSpec and Behat
* Easily update / migrate to newer versions of the API *(inc. data structures / formats)*
* Build and run all **automated tests** for multiple versions of PHP (eg. 5.4, 5.5, 5.6 ...)

## Future possibilities

* Use different versions of the API with the same SDK with **Adapters**
* Parallelisation of **requests** to greatly improve performance *(easily achieved with Guzzle)*
* First pass validation (simple validation before **request** is sent, final validation still occurs on API)


## Limitations of this library:

* Taking a vertical slice and applying best practices *(Get Ticket)*
* API call is mocked with [data](/tests/datafixtures/ticket.xml) from Kayako's [documentation](https://kayako.atlassian.net/wiki/display/DEV/REST+-+Ticket#REST-Ticket-GET/Tickets/Ticket/$ticketid$/)
* Time boxed to a few hours only as a Spike
* First iteration only. When additional requests are added certain areas will be refactored

## Current functionality in Gherkin [Scenario](/tests/features/ticket.feature):

```
Feature: Using the Ticket SDK with the Kayako API

  Scenario: Get a Ticket by ID
    Given I am authenticated
    When I request a ticket by ID "ABC-123-4567"
    Then I should receive the ticket
    And the ticket ID should match
```

## Directory structure

* `config` Configuration
    * Dependency Injection `php` file
    * Service Descriptions `json` file for Kayako API end-point configuration
* `src` Source code *(namespace `Kayako\PhpApiSdk`)*
    * `Entity` Domain Model (eg. Ticket, Post, Comments etc)
    * `Http` Clients for Hexagonal architecture and de-coupling of external resources
    * `Mapper` External / Internal mapping
        * `Adapter` xml / json etc
    * `Service` Business logic
    * `Builder.php` Constructs required objects

## Requirements

* Composer [more information](https://getcomposer.org)

## Installation

Recommended to install using composer

```
php composer.phar require kayako/php-api-sdk
```

## Usage

### Get Ticket by ID

```php
/** @var Kayako\PhpApiSdk\Service\TicketService $ticket */
$service = \Kayako\PhpApiSdk\Builder::create()->build('ticket');
$ticket  = $service->getById($arg1);
```

---

## Running automated tests

### PHPSpec

Run PHPSpec test suite

```
./vendor/bin/phpspec run --config=tests/phpspec.yml -vvv
```

Example Output

```
                                      100%                                       9
4 specs
9 examples (9 passed)
621ms
```

### Behat

Run Behat test suite

```
./vendor/bin/behat --config tests/behat.yml -vvv
```

Example Output

```
Feature: Using the Ticket SDK with the Kayako API

  Scenario: Get a Ticket by ID                   # features/ticket.feature:3
    Given I am authenticated                     # FeatureContext::iAmAuthenticated()
    When I request a ticket by ID "ABC-123-4567" # FeatureContext::iRequestATicketById()
    Then I should receive the ticket             # FeatureContext::iShouldReceiveTheTicket()
    And the ticket ID should match               # FeatureContext::theTicketIdShouldMatch()

1 scenario (1 passed)
4 steps (4 passed)
0m0.07s (14.81Mb)
```

---

## References

* Official [documentation](https://kayako.atlassian.net/wiki/display/DEV/PHP+API+Library)
* [Website](http://www.kayako.com/home/)
* Original [SDK](https://github.com/kayako/php-api-library)
