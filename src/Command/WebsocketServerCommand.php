<?php

namespace App\Command;

use App\Websocket\MessageHandler;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class WebsocketServerCommand extends Command
{
    protected static $defaultName = "run:websocket-server";

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $port = 3001;
        $handler = new MessageHandler();
        $output->writeln("Starting server on port " . $port);
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    $handler
                )
            ),
            $port
        );

        $server->loop->addPeriodicTimer(0.5, function () use ($handler) {
            $handler->sendPosts();
        });

        $server->run();
        return 0;
    }
}