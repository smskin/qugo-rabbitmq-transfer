<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO;

use Qugo\RabbitMQTransfer\BaseDTO;
use Illuminate\Validation\ValidationException;
use Qugo\RabbitMQTransfer\RabbitMQTransferService;

/**
 * Class DTOSubscribe
 *
 * @package Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO
 */
class DTOSubscribe extends BaseDTO
{
    /**
     * DTOSubscribe constructor.
     *
     * @param string $queue
     * @param string $defaultQueue
     * @throws ValidationException
     */
    public function __construct(string $queue, string $defaultQueue)
    {
        parent::__construct((object) [
            'queue' => $queue,
            'defaultQueue' => $defaultQueue
        ]);
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'queue' => 'required|string',
            'defaultQueue' => 'required|string|in:'.implode(',', [RabbitMQTransferService::QUEUE_TO_QUGO,RabbitMQTransferService::QUEUE_TO_SMZ])
        ];
    }
}
