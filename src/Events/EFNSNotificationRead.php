<?php

namespace Qugo\RabbitMQTransfer\Events;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\DTO\DTOFNSNotificationRead;


class EFNSNotificationRead extends BaseEvent
{
    /**
     * @var string
     */
    public $external_id;

    /**
     * EFNSNotificationRead constructor.
     *
     * @param DTOFNSNotificationRead $dto
     */
    public function __construct(DTOFNSNotificationRead $dto)
    {
        parent::__construct($dto);
        $this->external_id = $dto->data['external_id'];
    }
}
