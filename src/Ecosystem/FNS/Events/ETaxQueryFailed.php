<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Events;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOETaxQueryFailed;

/**
 * Class ETaxQueryFailed
 * @package Qugo\RabbitMQTransfer\Events
 */
class ETaxQueryFailed extends BaseEvent
{
    /**
     * @var string
     */
    public $inn;

    /**
     * @var string
     */
    public $requestDate;

    /**
     * @var string
     */
    public $reason;

    /**
     * ETaxQueryFailed constructor.
     *
     * @param DTOETaxQueryFailed $dto
     */
    public function __construct(DTOETaxQueryFailed $dto)
    {
        $this->inn = $dto->data['inn'];
        $this->requestDate = $dto->data['requestDate'];
        $this->reason = $dto->data['reason'];
        parent::__construct($dto);
    }
}
