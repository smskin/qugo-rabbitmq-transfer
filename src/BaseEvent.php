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
     * BaseEvent constructor.
     *
     * @param BaseDTO $dto
     */
    public function __construct(BaseDTO $dto)
    {
    }
}
