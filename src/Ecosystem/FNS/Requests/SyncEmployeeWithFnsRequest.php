<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Commands\SyncEmployeeWithFns;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOSyncEmployeeWithFns;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;

/**
 * Class WorkmanResetStatusRequest
 *
 * @package Qugo\RabbitMQTransfer\Requests
 */
class SyncEmployeeWithFnsRequest extends BaseRequest
{
    /**
     * @var string
     */
    public static $signature = 'employee.sync';

    /**
     * @var DTOSyncEmployeeWithFns
     */
    public $dto;

    /**
     * WorkmanToUnknownRequest constructor.
     *
     * @param DTOSyncEmployeeWithFns $dto
     */
    public function __construct(DTOSyncEmployeeWithFns $dto)
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
        return new SyncEmployeeWithFns($this->dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOSyncEmployeeWithFns::class;
    }
}
