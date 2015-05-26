<?php

namespace Spec\Kayako\PhpApiSdk\Http;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Guzzle\Service\Client as Guzzle;
use Guzzle\Service\Command\CommandInterface as Command;
use Guzzle\Http\Message\Response;

/**
 * Class ClientSpec
 * @package Spec\Kayako\PhpApiSdk\Http
 */
class ClientSpec extends ObjectBehavior
{
    function it_is_initializable(Guzzle $guzzle)
    {
        $this->beConstructedWith($guzzle);
        $this->shouldHaveType('Kayako\PhpApiSdk\Http\Client');
    }

    function it_prepares_the_command(Guzzle $guzzle, Command $command)
    {
        $name = 'testname';
        $args = array('id' => 123);

        $guzzle->getCommand($name, $args)
               ->shouldBeCalled()
               ->willReturn($command);

        $this->beConstructedWith($guzzle);

        $this->getCommand($name, $args)
            ->shouldHaveType('Guzzle\Service\Command\CommandInterface');
    }

    function it_should_execute(Guzzle $guzzle, Command $command, Response $response)
    {
        $guzzle->execute($command)
               ->shouldBeCalled()
               ->willReturn($response);

        $this->beConstructedWith($guzzle);

        $this->execute($command)
            ->shouldReturn($response);
    }
}
