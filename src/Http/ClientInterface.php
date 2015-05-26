<?php

namespace Kayako\PhpApiSdk\Http;

use Guzzle\Service\Command\CommandInterface;
use Guzzle\Service\Client as Guzzle;

/**
 * Interface ClientInterface
 * @package Kayako\PhpApiSdk\Http
 */
interface ClientInterface
{

    /**
     * @param Guzzle $guzzle
     */
    public function __construct(Guzzle $guzzle);

    /**
     * @param string $name
     * @param array  $parameters
     *
     * @return CommandInterface
     */
    public function getCommand($name, array $parameters);

    /**
     * @param CommandInterface $command
     *
     * @return \Guzzle\Http\Message\Response
     */
    public function execute(CommandInterface $command);
}
