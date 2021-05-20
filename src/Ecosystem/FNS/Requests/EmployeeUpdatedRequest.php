<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOEEmployeeUpdated;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Events\EEmployeeUpdated;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;

/**
 * Class WorkmanUpdatedStatusRequest
 *
 * @package Qugo\RabbitMQTransfer\Requests
 */
class EmployeeUpdatedRequest extends BaseRequest
{
    /**
     * @var string
     */
    public static $signature = 'employee.updated';

    /**
     * @var DTOEEmployeeUpdated
     */
    public $dto;

    /**
     * WorkmanUpdatedStatusRequest constructor.
     *
     * @param DTOEEmployeeUpdated $dto
     */
    public function __construct(DTOEEmployeeUpdated $dto)
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
        return new EEmployeeUpdated($this->dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOEEmployeeUpdated::class;
    }
}
