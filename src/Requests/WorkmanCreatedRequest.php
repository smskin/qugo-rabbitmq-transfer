<?php

namespace Qugo\RabbitMQTransfer\Requests;

use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\DTO\DTOWorkmanCreatedRequest;
use Qugo\RabbitMQTransfer\Events\EWorkmanCreated;
use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;

/**
 * Class WorkmanCreatedRequest
 *
 * @package Qugo\RabbitMQTransfer\Requests
 */
class WorkmanCreatedRequest extends BaseRequest
{
    public static $signature = 'workman.created';

    /**
     * @var DTOWorkmanCreatedRequest
     */
    public $dto;

    /**
     * WorkmanCreatedRequest constructor.
     *
     * @param DTOWorkmanCreatedRequest $dto
     */
    public function __construct(DTOWorkmanCreatedRequest $dto)
    {
        parent::__construct($dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOWorkmanCreatedRequest::class;
    }

    /**
     * @return string[]
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
        return new EWorkmanCreated($this->dto);
    }
}
