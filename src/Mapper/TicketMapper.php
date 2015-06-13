<?php

namespace Kayako\PhpApiSdk\Mapper;

use Kayako\PhpApiSdk\Mapper\Adapter\Ticket\TicketAdapterInterface;
use Kayako\PhpApiSdk\Entity\Ticket;

/**
 * Class TicketMapper
 * @package Kayako\PhpApiSdk\Mapper
 */
class TicketMapper
{

    /**
     * @var TicketAdapterInterface
     */
    protected $adapter;

    public function __construct(TicketAdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @param string $data
     *
     * @return Ticket
     */
    public function process($data)
    {
        return $this->adapter->process($data);
    }
}
