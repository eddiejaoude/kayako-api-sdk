<?php

namespace Spec\Kayako\PhpApiSdk\Mapper\Adapter\Ticket;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Guzzle\Service\Client as Guzzle;

/**
 * Class TicketXmlAdapterSpec
 * @package Spec\Kayako\PhpApiSdk\Mapper\Adapter\Ticket
 */
class TicketXmlAdapterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kayako\PhpApiSdk\Mapper\Adapter\Ticket\TicketXmlAdapter');
    }

    function it_should_process()
    {
        $data = '<tickets><ticket id="ABC-123-4567"></ticket></tickets>';

        $this->process($data)
             ->shouldHaveType('Kayako\PhpApiSdk\Entity\Ticket');
    }
}
