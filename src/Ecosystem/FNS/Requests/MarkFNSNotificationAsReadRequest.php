<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Commands\MarkFNSNotificationAsRead;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOMarkFNSNotificationAsRead;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;

/**
 * Class FNSNotificationReadRequest
 *
 * @package Qugo\RabbitMQTransfer\Requests
 */
class MarkFNSNotificationAsReadRequest extends BaseRequest
{
    /**
     * @var string
     */
    public static $signature = 'fns.fnsnotice.read';

    /**
     * @var DTOMarkFNSNotificationAsRead
     */
    public $dto;

    /**
     * FNSNotificationRead constructor.
     *
     * @param DTOMarkFNSNotificationAsRead $dto
     */
    public function __construct(DTOMarkFNSNotificationAsRead $dto)
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
        return new MarkFNSNotificationAsRead($this->dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOMarkFNSNotificationAsRead::class;
    }
}
