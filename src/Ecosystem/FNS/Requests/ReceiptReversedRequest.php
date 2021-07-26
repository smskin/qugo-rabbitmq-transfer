<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOEReceiptReversed;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Events\EReceiptReversed;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;

/**
 * Class ReceiptReversedRequest
 * @package Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests
 */
class ReceiptReversedRequest extends BaseRequest
{
    /**
     * @var string
     */
    public static $signature = 'receipt.reversed';

    /**
     * @var DTOEReceiptReversed
     */
    public $dto;

    /**
     * ReceiptGeneratedRequest constructor.
     *
     * @param DTOEReceiptReversed $dto
     */
    public function __construct(DTOEReceiptReversed $dto)
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
        return new EReceiptReversed($this->dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOEReceiptReversed::class;
    }
}
