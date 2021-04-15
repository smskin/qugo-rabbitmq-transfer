<?php

namespace Qugo\RabbitMQTransfer\Events;

use Qugo\RabbitMQTransfer\DTO\DTOWorkmanCreatedRequest;
use Qugo\RabbitMQTransfer\BaseEvent;

class EWorkmanCreated extends BaseEvent
{
    /**
     * @var string
     */
    public $inn;

    /**
     * EWorkmanCreated constructor.
     *
     * @param DTOWorkmanCreatedRequest $dto
     */
    public function __construct(DTOWorkmanCreatedRequest $dto)
    {
        parent::__construct($dto);
        $this->inn = $dto->data['inn'];
    }
}
