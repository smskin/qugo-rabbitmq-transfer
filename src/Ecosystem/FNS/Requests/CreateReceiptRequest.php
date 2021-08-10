<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Commands\CreateReceipt;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOCreateReceipt;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;

/**
 * Class ReceiptCreatedRequest
 *
 * @package Qugo\RabbitMQTransfer\Requests
 */
class CreateReceiptRequest extends BaseRequest
{
    /**
     * @var string
     */
    public static $signature = 'fns.receipt.create';

    /**
     * @var DTOCreateReceipt
     */
    public $dto;

    /**
     * ReceiptCreatedRequest constructor.
     *
     * @param DTOCreateReceipt $dto
     */
    public function __construct(DTOCreateReceipt $dto)
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
        return new CreateReceipt($this->dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOCreateReceipt::class;
    }
}
