<?php

namespace Qugo\RabbitMQTransfer\Requests;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\DTO\DTOWorkmanTaxRequestCreate;
use Qugo\RabbitMQTransfer\Events\EWorkmanTaxRequestCreate;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;

/**
 * Class WorkmanTaxRequestCreate
 *
 * @package Qugo\RabbitMQTransfer\Requests
 */
class WorkmanTaxRequestCreate extends BaseRequest
{
    /**
     * @var string
     */
    public static $signature = 'workman.taxRequest.create';

    /**
     * @var DTOWorkmanTaxRequestCreate
     */
    public $dto;

    /**
     * WorkmanTaxRequestCreate constructor.
     *
     * @param DTOWorkmanTaxRequestCreate $dto
     */
    public function __construct(DTOWorkmanTaxRequestCreate $dto)
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
        return new EWorkmanTaxRequestCreate($this->dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOWorkmanTaxRequestCreate::class;
    }
}
