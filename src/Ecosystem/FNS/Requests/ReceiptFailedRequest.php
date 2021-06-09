<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOEReceiptFailed;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Events\EReceiptFailed;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;

/**
 * Class ReceiptFailedRequest
 * @package Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests
 */
class ReceiptFailedRequest extends BaseRequest
{
    /**
     * @var string
     */
    public static $signature = 'receipt.failed';

    /**
     * @var DTOEReceiptFailed
     */
    public $dto;

    /**
     * ReceiptGeneratedRequest constructor.
     *
     * @param DTOEReceiptFailed $dto
     */
    public function __construct(DTOEReceiptFailed $dto)
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
        return new EReceiptFailed($this->dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOEReceiptFailed::class;
    }
}
