<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\Security\Http\Event\LoginFailureEvent;
use Psr\Log\LoggerInterface;

#[asEventListener()]
final class EventListener
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(LoginFailureEvent $event): void
    {
        $ip = $event->getRequest()->getClientIp();
        $message = sprintf('Login failure for IP: %s', $ip);

        $this->logger->info($message);
    }
}


