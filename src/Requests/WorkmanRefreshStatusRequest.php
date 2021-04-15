<?php


namespace Qugo\RabbitMQTransfer\Requests;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\DTO\DTOWorkmanRefreshStatus;
use Qugo\RabbitMQTransfer\Events\EWorkmanRefreshStatus;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;

class WorkmanRefreshStatusRequest extends BaseRequest
{
    /**
     * @var DTOWorkmanRefreshStatus
     */
    public $dto;

    /**
     * WorkmanToUnknownRequest constructor.
     *
     * @param DTOWorkmanRefreshStatus $dto
     */
    public function __construct(DTOWorkmanRefreshStatus $dto)
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
        return new EWorkmanRefreshStatus($this->dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOWorkmanRefreshStatus::class;
    }
}
