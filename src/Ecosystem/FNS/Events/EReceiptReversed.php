<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Events;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOEReceiptReversed;

/**
 * Class EReceiptReversed
 * @package Qugo\RabbitMQTransfer\Ecosystem\FNS\Events
 */
class EReceiptReversed extends BaseEvent
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $externalRequestTime;

    /**
     * @var string
     */
    public $reason;

    /**
     * EReceiptGenerated constructor.
     *
     * @param DTOEReceiptReversed $dto
     */
    public function __construct(DTOEReceiptReversed $dto)
    {
        parent::__construct($dto);

        $this->id = $dto->data['id'];
        $this->externalRequestTime = $dto->data['externalRequestTime'];
        $this->reason = $dto->data['reason'];
    }
}
