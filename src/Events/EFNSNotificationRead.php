<?php

namespace Qugo\RabbitMQTransfer\Events;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\DTO\DTOFNSNotificationRead;

/**
 * Class EFNSNotificationRead
 *
 * @package Qugo\RabbitMQTransfer\Events
 */
class EFNSNotificationRead extends BaseEvent
{
    /**
     * @var string
     */
    public $externalID;

    /**
     * EFNSNotificationRead constructor.
     *
     * @param DTOFNSNotificationRead $dto
     */
    public function __construct(DTOFNSNotificationRead $dto)
    {
        parent::__construct($dto);
        $this->externalID = $dto->data['externalID'];
    }
}
