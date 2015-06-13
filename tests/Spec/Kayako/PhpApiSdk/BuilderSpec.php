<?php

namespace Spec\Kayako\PhpApiSdk;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class BuilderSpec
 * @package Spec\Kayako\PhpApiSdk
 */
class BuilderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kayako\PhpApiSdk\Builder');
    }

    function it_should_not_build()
    {
        $this->shouldThrow('\InvalidArgumentException')
            ->duringBuild('invalid');
    }

    function it_should_build()
    {
        $this->build('ticket')
            ->shouldHaveType('Kayako\PhpApiSdk\Service\TicketService');
    }
}
