<?php

return [
    'app.mode'                                                => DI\env('APP_MODE', 'dev'), // @TODO should default to `prod`
    'guzzle.ticket.descriptions'                              => 'config/ticket-descriptions.json',

    'Guzzle\Service\Description\ServiceDescription'           => DI\factory(
    // @TODO: Annonymous functions not cache to Opcode, move to class
        function (\DI\Container $c) {
            return \Guzzle\Service\Description\ServiceDescription::factory(
                $c->get('guzzle.ticket.descriptions')
            );
        }
    ),

    'Guzzle\Service\Client'                                   => DI\factory(
    // @TODO: Annonymous functions do not cache to Opcode, move to class
        function (\DI\Container $c) {
            $client = new \Guzzle\Service\Client();
            $client->setDescription($c->get('Guzzle\Service\Description\ServiceDescription'));

            if ('dev' === $c->get('app.mode')) {
                $plugin = new Guzzle\Plugin\Mock\MockPlugin();
                $plugin->addResponse(
                    new Guzzle\Http\Message\Response(
                        200,
                        [],
                        file_get_contents('tests/datafixtures/ticket.xml')
                    )
                );

                $client->addSubscriber($plugin);
            }

            return $client;
        }
    ),

    'Kayako\PhpApiSdk\Mapper\Adapter\Ticket\TicketXmlAdapter' => DI\object(),
    'Kayako\PhpApiSdk\Mapper\TicketMapper'                    => DI\object()
        ->constructor(
            DI\link('Kayako\PhpApiSdk\Mapper\Adapter\Ticket\TicketXmlAdapter')
        ),

    'Kayako\PhpApiSdk\Service\TicketService'                          => DI\object()
        ->constructor(
            DI\link('Kayako\PhpApiSdk\Http\Client'),
            DI\link('Kayako\PhpApiSdk\Mapper\TicketMapper')
        ),
];
