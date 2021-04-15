<?php

namespace Qugo\RabbitMQTransfer\Events;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\DTO\DTOWorkmanRefreshStatus;

/**
 * Class EWorkmanToUnknown
 *
 * @package Qugo\RabbitMQTransfer\Events
 */
class EWorkmanRefreshStatus extends BaseEvent
{
    /**
     * @var
     */
    public $inn;

    /**
     * EWorkmanToUnknown constructor.
     *
     * @param DTOWorkmanRefreshStatus $dto
     */
    public function __construct(DTOWorkmanRefreshStatus $dto)
    {
        $this->inn = $dto->data['inn'];
        parent::__construct($dto);
    }
}
