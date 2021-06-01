<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Commands;

use Qugo\RabbitMQTransfer\BaseCommand;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOSubscribe;

/**
 * Class Subscribe
 *
 * @package Qugo\RabbitMQTransfer\Ecosystem\FNS\Commands
 */
class Subscribe extends BaseCommand
{
    /**
     * @var string
     */
    public $queue;

    /**
     * @var string
     */
    public $defaultQueue;

    /**
     * Subscribe constructor.
     *
     * @param DTOSubscribe $dto
     */
    public function __construct(DTOSubscribe $dto)
    {
        parent::__construct($dto);
        $this->queue = $dto->data['queue'];
        $this->defaultQueue = $dto->data['defaultQueue'];
    }
}
