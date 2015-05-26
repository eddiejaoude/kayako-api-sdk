<?php

namespace Kayako\PhpApiSdk\Service;

use Kayako\PhpApiSdk\Http\Client;
use Kayako\PhpApiSdk\Mapper\TicketMapper;
use Kayako\PhpApiSdk\Entity\Ticket;

/**
 * Class Ticket
 * @package Kayako\PhpApiSdk\Ticket
 */
class TicketService
{

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var TicketMapper
     */
    protected $mapper;

    /**
     * @param Client       $client
     * @param TicketMapper $mapper
     */
    public function __construct(Client $client, TicketMapper $mapper)
    {
        $this->client = $client;
        $this->mapper = $mapper;
    }

    /**
     * @param string $id
     *
     * @return Ticket
     */
    public function getById($id)
    {
        $response = $this->client
            ->execute(
                $this->client
                    ->getCommand(
                        'GetTicket',
                        array('id' => $id)
                    )
            );


        return $this->mapper
            ->process(
                $response->getBody(true)
            );
    }
}
