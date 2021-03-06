<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOEReceiptUpdated;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Events\EReceiptUpdated;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;

/**
 * Class ReceiptUpdatedRequest
 * @package Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests
 */
class ReceiptUpdatedRequest extends BaseRequest
{
    /**
     * @var string
     */
    public static $signature = 'receipt.updated';

    /**
     * @var DTOEReceiptUpdated
     */
    public $dto;

    /**
     * ReceiptGeneratedRequest constructor.
     *
     * @param DTOEReceiptUpdated $dto
     */
    public function __construct(DTOEReceiptUpdated $dto)
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
        return new EReceiptUpdated($this->dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOEReceiptUpdated::class;
    }
}
