<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOEEmployeeTaxRequestCreated;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Events\EEmployeeTaxRequestCreated;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;

/**
 * Class WorkmanTaxRequestCreate
 *
 * @package Qugo\RabbitMQTransfer\Requests
 */
class EmployeeTaxRequestCreatedRequest extends BaseRequest
{
    /**
     * @var string
     */
    public static $signature = 'employee.taxRequest.created';

    /**
     * @var DTOEEmployeeTaxRequestCreated
     */
    public $dto;

    /**
     * WorkmanTaxRequestCreate constructor.
     *
     * @param DTOEEmployeeTaxRequestCreated $dto
     */
    public function __construct(DTOEEmployeeTaxRequestCreated $dto)
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
        return new EEmployeeTaxRequestCreated($this->dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOEEmployeeTaxRequestCreated::class;
    }
}
