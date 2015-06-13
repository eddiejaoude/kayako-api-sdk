<?php

namespace Kayako\PhpApiSdk\Mapper\Adapter\Ticket;

use Kayako\PhpApiSdk\Entity\Ticket;

/**
 * Class TicketXmlAdapter
 * @package Kayako\PhpApiSdk\Mapper\Adapter
 */
class TicketXmlAdapter implements TicketAdapterInterface
{

    /**
     * @param string $xml
     *
     * @return Ticket
     */
    public function process($xml)
    {
        // @TODO move object to dependency (use DI to create)
        $ticketXml = new \SimpleXMLElement($xml);

        $ticket = new Ticket();
        $ticket->setId((string)$ticketXml->ticket['id']);

        return $ticket;
    }
}
