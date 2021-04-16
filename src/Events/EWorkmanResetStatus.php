<?php

namespace Qugo\RabbitMQTransfer\Events;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\DTO\DTOWorkmanResetStatus;

/**
 * Class EWorkmanToUnknown
 *
 * @package Qugo\RabbitMQTransfer\Events
 */
class EWorkmanResetStatus extends BaseEvent
{
    /**
     * @var
     */
    public $inn;

    /**
     * EWorkmanToUnknown constructor.
     *
     * @param DTOWorkmanResetStatus $dto
     */
    public function __construct(DTOWorkmanResetStatus $dto)
    {
        $this->inn = $dto->data['inn'];
        parent::__construct($dto);
    }
}
