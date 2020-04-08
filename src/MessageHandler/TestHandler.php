<?php

namespace App\MessageHandler;

use App\Message\TestMessage;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class TestHandler implements MessageHandlerInterface
{

    public function __invoke(TestMessage $message, LoggerInterface $logger)
    {
        sleep(4);
        $logger->info(date("M,d,Y h:i:s A") . " >> " . $message->getContent());
    }

}
