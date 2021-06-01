<?php

namespace Qugo\RabbitMQTransfer;

/**
 * Class BaseRequest
 *
 * @package Qugo\RabbitMQTransfer
 */
abstract class BaseRequest
{
    /**
     * @var string
     */
    public static $signature;

    /**
     * @var BaseDTO
     */
    public $dto;

    /**
     * @var BaseEvent
     */
    public $event;

    /**
     * @var array
     */
    public $queues = [];

    /**
     * @var string
     */
    public $sender;

    /**
     * BaseRequest constructor.
     *
     * @param BaseDTO $dto
     */
    public function __construct(BaseDTO $dto)
    {
        $this->dto = $dto;
        $this->event = $this->getEvent();
        $this->queues = $this->getQueues();
    }

    /**
     * @return array
     */
    abstract public function getQueues(): array;

    /**
     * @param array $queues
     * @return $this
     */
    public function setQueues(array $queues): BaseRequest
    {
        $this->queues = $queues;
        return $this;
    }

    /**
     * @param array $sender
     * @return $this
     */
    public function setSender(array $sender): BaseRequest
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * @return BaseEvent
     */
    abstract public function getEvent(): BaseEvent;

    /**
     * @return string
     */
    abstract public static function getDTOClass(): string;
}
