<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOEReceiptCreated;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Events\EReceiptCreated;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;

/**
 * Class ReceiptCreatedRequest
 *
 * @package Qugo\RabbitMQTransfer\Requests
 */
class ReceiptCreatedRequest extends BaseRequest
{
    /**
     * @var string
     */
    public static $signature = 'fns.receipt.created';

    /**
     * @var DTOEReceiptCreated
     */
    public $dto;

    /**
     * ReceiptGeneratedRequest constructor.
     *
     * @param DTOEReceiptCreated $dto
     */
    public function __construct(DTOEReceiptCreated $dto)
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
        return new EReceiptCreated($this->dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOEReceiptCreated::class;
    }
}
