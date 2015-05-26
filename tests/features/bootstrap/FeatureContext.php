<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{

    /**
     * @var int
     */
    protected $request;

    /**
     * @var \Kayako\PhpApiSdk\Entity\Ticket
     */
    protected $response;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @TODO implement authentication
     *
     * @Given I am authenticated
     */
    public function iAmAuthenticated()
    {
        return;
    }

    /**
     * @When I request a ticket by ID :arg1
     */
    public function iRequestATicketById($arg1)
    {
        $this->request = $arg1;

        /** @var Kayako\PhpApiSdk\Service\TicketService $ticket */
        $service = \Kayako\PhpApiSdk\Builder::create()->build('ticket');
        $this->response = $service->getById($arg1);
    }

    /**
     * @Then I should receive the ticket
     */
    public function iShouldReceiveTheTicket()
    {
        if ($this->response instanceof \Kayako\PhpApiSdk\Entity\Ticket)
        {
            return true;
        }

        throw new \Exception('Wrong type in response');
    }

    /**
     * @Then the ticket ID should match
     */
    public function theTicketIdShouldMatch()
    {
        if ($this->response->getId() == $this->request) {
            return true;
        }

        throw new \Exception(
            'IDs do NOT match. ' .
            'Expected: ' . $this->request .
            ', Actual: ' . $this->response->getId()
        );
    }
}
