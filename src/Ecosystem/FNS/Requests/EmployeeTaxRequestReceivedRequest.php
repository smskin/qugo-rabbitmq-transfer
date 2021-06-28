<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOEEmployeeTaxRequestReceived;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Events\EEmployeeTaxRequestReceived;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;

/**
 * Class EmployeeTaxRequestReceivedRequest
 *
 * @package Qugo\RabbitMQTransfer\Requests
 */
class EmployeeTaxRequestReceivedRequest extends BaseRequest
{
    /**
     * @var string
     */
    public static $signature = 'employee.taxRequest.received';

    /**
     * @var DTOEEmployeeTaxRequestReceived
     */
    public $dto;

    /**
     * WorkmanTaxRequestCreate constructor.
     *
     * @param DTOEEmployeeTaxRequestReceived $dto
     */
    public function __construct(DTOEEmployeeTaxRequestReceived $dto)
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
        return new EEmployeeTaxRequestReceived($this->dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOEEmployeeTaxRequestReceived::class;
    }
}
