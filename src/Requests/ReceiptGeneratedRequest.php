<?php

namespace Qugo\RabbitMQTransfer\Requests;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\DTO\DTOReceiptGenerated;
use Qugo\RabbitMQTransfer\Events\EReceiptGenerated;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;

/**
 * Class ReceiptGeneratedRequest
 *
 * @package Qugo\RabbitMQTransfer\Requests
 */
class ReceiptGeneratedRequest extends BaseRequest
{
    /**
     * @var DTOReceiptGenerated
     */
    public $dto;

    /**
     * ReceiptGeneratedRequest constructor.
     *
     * @param DTOReceiptGenerated $dto
     */
    public function __construct(DTOReceiptGenerated $dto)
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
        return new EReceiptGenerated($this->dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOReceiptGenerated::class;
    }
}
