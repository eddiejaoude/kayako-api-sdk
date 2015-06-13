<?php

namespace Spec\Kayako\PhpApiSdk\Service;

use Guzzle\Service\Command\CommandInterface;
use Kayako\PhpApiSdk\Entity\Ticket;
use Kayako\PhpApiSdk\Http\Client;
use Kayako\PhpApiSdk\Mapper\TicketMapper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Guzzle\Http\Message\Response;

/**
 * Class TicketServiceSpec
 * @package Spec\Kayako\PhpApiSdk\Service
 *
 * @mixin \Kayako\PhpApiSdk\Service\TicketService
 */
class TicketServiceSpec extends ObjectBehavior
{
    function it_is_initializable(Client $client, TicketMapper $mapper)
    {
        $this->beConstructedWith($client, $mapper);
        $this->shouldHaveType('Kayako\PhpApiSdk\Service\TicketService');
    }

    // @TODO too many dependencies... refactor
    function it_should_get_ticket_by_id(
        Client $client,
        TicketMapper $mapper,
        CommandInterface $command,
        Response $response,
        Ticket $ticket
    )
    {
        $id = 123;
        $name = 'GetTicket';
        $args = array('id' => $id);
        $xml = '<ticket>test</ticket>';

        $client->getCommand($name, $args)
               ->shouldBeCalled()
               ->willReturn($command);

        $client->execute($command)
               ->shouldBeCalled()
               ->willReturn($response);

        $response->getBody(true)
               ->shouldBeCalled()
               ->willReturn($xml);

        $mapper->process($xml)
               ->shouldBeCalled()
               ->willReturn($ticket);

        $this->beConstructedWith($client, $mapper);

        $this->getById($id)
            ->shouldHaveType('Kayako\PhpApiSdk\Entity\Ticket');
    }
}
