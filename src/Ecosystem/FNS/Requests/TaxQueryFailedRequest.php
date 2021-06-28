<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOETaxQueryFailed;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Events\ETaxQueryFailed;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;

/**
 * Class TaxQueryFailedRequest
 *
 * @package Qugo\RabbitMQTransfer\Requests
 */
class TaxQueryFailedRequest extends BaseRequest
{
    /**
     * @var string
     */
    public static $signature = 'employee.taxQuery.failed';

    /**
     * @var DTOETaxQueryFailed
     */
    public $dto;

    /**
     * TaxQueryFailedRequest constructor.
     *
     * @param DTOETaxQueryFailed $dto
     */
    public function __construct(DTOETaxQueryFailed $dto)
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
        return new ETaxQueryFailed($this->dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOETaxQueryFailed::class;
    }
}
