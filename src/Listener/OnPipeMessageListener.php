<?php

namespace He426100\Casbin\Listener;

use Psr\Container\ContainerInterface;
use Hyperf\Event\Contract\ListenerInterface;
use Hyperf\Framework\Event\OnPipeMessage;
use Hyperf\Process\Event\PipeMessage as UserProcessPipeMessage;
use He426100\Casbin\Event\PipeMessage;
use Casbin\Enforcer;

class OnPipeMessageListener implements ListenerInterface
{

    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return string[] returns the events that you want to listen
     */
    public function listen(): array
    {
        return [
            OnPipeMessage::class,
            UserProcessPipeMessage::class,
        ];
    }

    /**
     * Handle the Event when the event is triggered, all listeners will
     * complete before the event is returned to the EventDispatcher.
     */
    public function process(object $event): void
    {
        if (($event instanceof OnPipeMessage || $event instanceof UserProcessPipeMessage) && $event->data instanceof PipeMessage) {
            $message = $event->data;
            switch ($message->action) {
                case PipeMessage::LOAD_POLICY:
                    $this->container->get(Enforcer::class)->loadPolicy();
                    break;
            }
        }
    }

}
