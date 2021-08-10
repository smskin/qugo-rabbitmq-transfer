<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests;

use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Commands\CreateEmployee;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOCreateEmployee;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;

/**
 * Class WorkmanCreatedRequest
 *
 * @package Qugo\RabbitMQTransfer\Requests
 */
class CreateEmployeeRequest extends BaseRequest
{
    /**
     * @var string
     */
    public static $signature = 'fns.employee.create';

    /**
     * @var DTOCreateEmployee
     */
    public $dto;

    /**
     * WorkmanCreatedRequest constructor.
     *
     * @param DTOCreateEmployee $dto
     */
    public function __construct(DTOCreateEmployee $dto)
    {
        parent::__construct($dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOCreateEmployee::class;
    }

    /**
     * @return string[]
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
        return new CreateEmployee($this->dto);
    }
}
