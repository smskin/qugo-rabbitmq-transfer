<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Events;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOEReceiptCreated;

/**
 * Class EReceiptCreated
 * @package Qugo\RabbitMQTransfer\Ecosystem\FNS\Events
 */
class EReceiptCreated extends BaseEvent
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $stateID;

    /**
     * @var string
     */
    public $externalURL;

    /**
     * @var string
     */
    public $externalIDent;

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
     * @param DTOEReceiptCreated $dto
     */
    public function __construct(DTOEReceiptCreated $dto)
    {
        parent::__construct($dto);

        $this->id = $dto->data['id'];
        $this->stateID = $dto->data['stateID'];
        $this->externalURL = $dto->data['externalURL'];
        $this->externalIDent = $dto->data['externalIDent'];
        $this->externalRequestTime = $dto->data['externalRequestTime'];
        $this->externalError = $dto->data['externalError'];
    }
}
