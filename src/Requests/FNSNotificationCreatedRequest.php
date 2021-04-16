<?php

namespace Qugo\RabbitMQTransfer\Requests;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\DTO\DTOFNSNotificationCreated;
use Qugo\RabbitMQTransfer\Events\EFNSNotificationCreated;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;

class FNSNotificationCreatedRequest extends BaseRequest
{
    /**
     * @var DTOFNSNotificationCreated
     */
    public $dto;

    /**
     * FNSNotificationCreatedRequest constructor.
     *
     * @param DTOFNSNotificationCreated $dto
     */
    public function __construct(DTOFNSNotificationCreated $dto)
    {
        parent::__construct($dto);
    }

    /**
     * @return array
     */
    public function getQueues(): array
    {
        return [
            RabbitMQTransferService::QUEUE_TO_QUGO
        ];
    }

    /**
     * @return BaseEvent
     */
    public function getEvent(): BaseEvent
    {
        return new EFNSNotificationCreated($this->dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOFNSNotificationCreated::class;
    }
}
