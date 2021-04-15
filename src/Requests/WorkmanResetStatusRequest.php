<?php


namespace Qugo\RabbitMQTransfer\Requests;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\DTO\DTOWorkmanResetStatus;
use Qugo\RabbitMQTransfer\Events\EWorkmanResetStatus;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;

class WorkmanResetStatusRequest extends BaseRequest
{
    /**
     * @var DTOWorkmanResetStatus
     */
    public $dto;

    /**
     * WorkmanToUnknownRequest constructor.
     *
     * @param DTOWorkmanResetStatus $dto
     */
    public function __construct(DTOWorkmanResetStatus $dto)
    {
        parent::__construct($dto);
    }

    /**
     * @return array
     */
    public function getQueues(): array
    {
        return [RabbitMQTransferService::QUEUE_TO_SMZ];
    }

    /**
     * @return BaseEvent
     */
    public function getEvent(): BaseEvent
    {
        return new EWorkmanResetStatus($this->dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOWorkmanResetStatus::class;
    }
}
