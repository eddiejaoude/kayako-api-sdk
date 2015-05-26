<?php

namespace Spec\Kayako\PhpApiSdk\Mapper;

use Kayako\PhpApiSdk\Entity\Ticket;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Kayako\PhpApiSdk\Mapper\Adapter\Ticket\TicketAdapterInterface as TicketAdapter;

/**
 * Class TicketMapperSpec
 * @package Spec\Kayako\PhpApiSdk\Mapper
 */
class TicketMapperSpec extends ObjectBehavior
{
    function it_is_initializable(TicketAdapter $adapter)
    {
        $this->beConstructedWith($adapter);
        $this->shouldHaveType('Kayako\PhpApiSdk\Mapper\TicketMapper');
    }

    function it_should_process(TicketAdapter $adapter)
    {
        $data = '<data>test</data>';

        $adapter->process($data)
               ->shouldBeCalled()
               ->willReturn(
                   new Ticket()
               );

        $this->beConstructedWith($adapter);

        $this->process($data)
            ->shouldHaveType('Kayako\PhpApiSdk\Entity\Ticket');
    }
}
