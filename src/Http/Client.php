<?php

namespace Kayako\PhpApiSdk\Http;

use Guzzle\Service\Client as Guzzle;
use Guzzle\Service\Command\CommandInterface;

/**
 * Class Client
 * @package Kayako\PhpApiSdk\Http
 */
class Client
{

    /**
     * @var Guzzle
     */
    protected $guzzle;

    /**
     * @param Guzzle $guzzle
     */
    public function __construct(Guzzle $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    /**
     * @param string $name
     * @param array  $parameters
     *
     * @return CommandInterface
     */
    public function getCommand($name, array $parameters)
    {
        return $this->guzzle
            ->getCommand($name, $parameters);
    }

    /**
     * @param CommandInterface $command
     *
     * @return \Guzzle\Http\Message\Response
     */
    public function execute(CommandInterface $command)
    {
        return $this->guzzle
            ->execute($command);
    }
}
