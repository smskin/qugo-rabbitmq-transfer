<?php

namespace Qugo\RabbitMQTransfer\Requests;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\DTO\DTOFNSNotificationRead;
use Qugo\RabbitMQTransfer\Events\EFNSNotificationRead;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;

class FNSNotificationRead extends BaseRequest
{
    /**
     * @var DTOFNSNotificationRead
     */
    public $dto;

    /**
     * FNSNotificationRead constructor.
     *
     * @param DTOFNSNotificationRead $dto
     */
    public function __construct(DTOFNSNotificationRead $dto)
    {
        parent::__construct($dto);
    }

    /**
     * @return array
     */
    public function getQueues(): array
    {
        return [
            RabbitMQTransferService::QUEUE_TO_SMZ
        ];
    }

    /**
     * @return BaseEvent
     */
    public function getEvent(): BaseEvent
    {
        return new EFNSNotificationRead($this->dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOFNSNotificationRead::class;
    }
}
