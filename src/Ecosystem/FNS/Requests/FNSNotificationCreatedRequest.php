<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOEFNSNotificationCreated;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Events\EFNSNotificationCreated;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;

/**
 * Class FNSNotificationCreatedRequest
 *
 * @package Qugo\RabbitMQTransfer\Requests
 */
class FNSNotificationCreatedRequest extends BaseRequest
{
    /**
     * @var string
     */
    public static $signature = 'fnsnotice.created';

    /**
     * @var DTOEFNSNotificationCreated
     */
    public $dto;

    /**
     * FNSNotificationCreatedRequest constructor.
     *
     * @param DTOEFNSNotificationCreated $dto
     */
    public function __construct(DTOEFNSNotificationCreated $dto)
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
        return DTOEFNSNotificationCreated::class;
    }
}
