<?php

namespace Qugo\RabbitMQTransfer\Events;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\DTO\DTOFNSNotificationRead;


class EFNSNotificationRead extends BaseEvent
{
    /**
     * @var string
     */
    public $id;

    /**
     * EFNSNotificationRead constructor.
     *
     * @param DTOFNSNotificationRead $dto
     */
    public function __construct(DTOFNSNotificationRead $dto)
    {
        parent::__construct($dto);
        $this->id = $dto->data['id'];
    }
}
