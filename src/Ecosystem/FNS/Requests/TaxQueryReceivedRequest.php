<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOTaxQueryReceived;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Events\ETaxQueryReceived;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;

/**
 * Class TaxQueryReceivedRequest
 *
 * @package Qugo\RabbitMQTransfer\Requests
 */
class TaxQueryReceivedRequest extends BaseRequest
{
    /**
     * @var string
     */
    public static $signature = 'fns.employee.taxQuery.received';

    /**
     * @var DTOTaxQueryReceived
     */
    public $dto;

    /**
     * TaxQueryReceivedRequest constructor.
     *
     * @param DTOTaxQueryReceived $dto
     */
    public function __construct(DTOTaxQueryReceived $dto)
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
        return new ETaxQueryReceived($this->dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOTaxQueryReceived::class;
    }
}
