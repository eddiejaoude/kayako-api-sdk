<?php

namespace Kayako\PhpApiSdk\Entity;

/**
 * Class Ticket
 * @package Kayako\PhpApiSdk\Entity
 */
class Ticket
{

    /**
     * @var string
     */
    protected $id = '';

    // ...
    // @TODO All other properties
    // ...

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return Ticket
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
