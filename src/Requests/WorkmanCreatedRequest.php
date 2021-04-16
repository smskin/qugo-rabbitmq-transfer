<?php

namespace Qugo\RabbitMQTransfer\Requests;

use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\DTO\DTOWorkmanCreated;
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
     * @var DTOWorkmanCreated
     */
    public $dto;

    /**
     * WorkmanCreatedRequest constructor.
     *
     * @param DTOWorkmanCreated $dto
     */
    public function __construct(DTOWorkmanCreated $dto)
    {
        parent::__construct($dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOWorkmanCreated::class;
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
