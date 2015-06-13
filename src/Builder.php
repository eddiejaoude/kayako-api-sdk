<?php

namespace Kayako\PhpApiSdk;

/**
 * Class Builder
 * @package Kayako\PhpApiSdk
 */
class Builder
{
    /**
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    /**
     * @param $endpoint
     *
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function build($endpoint)
    {
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions('config/di-config.php');

        $container = $builder->build();

        switch($endpoint) {
            case 'ticket':
                return $container->get('Kayako\PhpApiSdk\Service\TicketService');
        }

        throw new \InvalidArgumentException('Service not found');
    }
}
