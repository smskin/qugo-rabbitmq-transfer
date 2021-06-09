<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Events;

use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOEReceiptUpdated;

/**
 * Class EReceiptUpdated
 * @package Qugo\RabbitMQTransfer\Ecosystem\FNS\Events
 */
class EReceiptUpdated extends EReceiptCreated
{
    /**
     * EReceiptGenerated constructor.
     *
     * @param DTOEReceiptUpdated $dto
     */
    public function __construct(DTOEReceiptUpdated $dto)
    {
        parent::__construct($dto);

        $this->id = $dto->data['id'];
        $this->externalURL = $dto->data['externalURL'];
        $this->externalIDent = $dto->data['externalIDent'];
        $this->externalRequestTime = $dto->data['externalRequestTime'];
    }
}
