<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Requests;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\BaseRequest;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOSubscribe;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\Commands\Subscribe;

class SubscribeRequest extends BaseRequest
{
    /**
     * @var string
     */
    public static $signature = 'subscribe';

    /**
     * @var DTOSubscribe
     */
    public $dto;

    /**
     * SubscribeRequest constructor.
     *
     * @param DTOSubscribe $dto
     */
    public function __construct( DTOSubscribe $dto )
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
        return new Subscribe($this->dto);
    }

    /**
     * @return string
     */
    public static function getDTOClass(): string
    {
        return DTOSubscribe::class;
    }
}
