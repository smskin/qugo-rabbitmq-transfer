<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Events;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOEReceiptFailed;

/**
 * Class EReceiptFailed
 * @package Qugo\RabbitMQTransfer\Ecosystem\FNS\Events
 */
class EReceiptFailed extends BaseEvent
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
    public $externalError;

    /**
     * EReceiptGenerated constructor.
     *
     * @param DTOEReceiptFailed $dto
     */
    public function __construct(DTOEReceiptFailed $dto)
    {
        parent::__construct($dto);

        $this->id = $dto->data['id'];
        $this->externalRequestTime = $dto->data['externalRequestTime'];
        $this->externalError = $dto->data['externalError'];
    }
}
