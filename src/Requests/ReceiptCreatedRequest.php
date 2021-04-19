<?php

namespace Qugo\RabbitMQTransfer\Requests;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\DTO\DTOReceiptCreated;
use Qugo\RabbitMQTransfer\Events\EReceiptCreated;
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
    public static $signature = 'receipt.created';

    /**
     * @var DTOReceiptCreated
     */
    public $dto;

    /**
     * ReceiptCreatedRequest constructor.
     *
     * @param DTOReceiptCreated $dto
     */
    public function __construct(DTOReceiptCreated $dto)
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
        return new EReceiptCreated($this->dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOReceiptCreated::class;
    }
}
