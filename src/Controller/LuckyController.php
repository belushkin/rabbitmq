<?php

namespace App\Controller;

use App\Message\TestMessage;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Messenger\MessageBusInterface;


class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky", name="lucky")
     * @param MessageBusInterface $bus
     * @return JsonResponse
     */
    public function index(MessageBusInterface $bus, LoggerInterface $logger)
    {
//        $logger->info(date("M,d,Y h:i:s A"));
        for ($i = 0; $i < 10000; $i++) {
            $bus->dispatch(new TestMessage($i));
        }

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/LuckyController.php',
        ]);
    }
}
