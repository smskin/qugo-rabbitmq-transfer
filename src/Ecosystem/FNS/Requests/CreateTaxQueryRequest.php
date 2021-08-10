<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOCreateTaxQuery;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Commands\CreateTaxQuery;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;

/**
 * Class CreateTaxQueryRequest
 *
 * @package Qugo\RabbitMQTransfer\Requests
 */
class CreateTaxQueryRequest extends BaseRequest
{
    /**
     * @var string
     */
    public static $signature = 'fns.employee.taxQuery.create';

    /**
     * @var DTOCreateTaxQuery
     */
    public $dto;

    /**
     * WorkmanTaxRequestCreate constructor.
     *
     * @param DTOCreateTaxQuery $dto
     */
    public function __construct(DTOCreateTaxQuery $dto)
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
        return new CreateTaxQuery($this->dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOCreateTaxQuery::class;
    }
}
