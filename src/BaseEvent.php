<?php

namespace Qugo\RabbitMQTransfer;

/**
 * Class BaseEvent
 *
 * @package Qugo\RabbitMQTransfer
 */
abstract class BaseEvent
{
    /**
     * @var string
     */
    public $senderQueue;

    /**
     * BaseEvent constructor.
     *
     * @param BaseDTO $dto
     */
    public function __construct(BaseDTO $dto)
    {
    }

    /**
     * @param string $queue
     * @return $this
     */
    public function setSenderQueue(string $queue): BaseEvent
    {
        $this->senderQueue = $queue;
        return $this;
    }
}
