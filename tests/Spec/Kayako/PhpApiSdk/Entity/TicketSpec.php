<?php

namespace Spec\Kayako\PhpApiSdk\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class TicketSpec
 * @package Spec\Kayako\PhpApiSdk\Entity
 */
class TicketSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kayako\PhpApiSdk\Entity\Ticket');
    }

    function it_should_set_then_get_id()
    {
        $data = 123;
        $this->setId($data)
             ->shouldHaveType('Kayako\PhpApiSdk\Entity\Ticket');
        $this->getId()->shouldReturn($data);
    }
}
