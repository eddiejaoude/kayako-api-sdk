<?php

namespace Kayako\PhpApiSdk\Mapper\Adapter\Ticket;

use Kayako\PhpApiSdk\Entity\Ticket;

/**
 * Interface TicketAdapterInterface
 * @package Kayako\PhpApiSdk\Mapper\Adapter
 */
interface TicketAdapterInterface
{

    /**
     * @param string $data
     *
     * @return Ticket
     */
    public function process($data);
}
