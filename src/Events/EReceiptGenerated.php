<?php

namespace Qugo\RabbitMQTransfer\Events;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\DTO\DTOReceiptGenerated;

class EReceiptGenerated extends BaseEvent
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
    public $externalIdent;

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
     * @param DTOReceiptGenerated $dto
     */
    public function __construct(DTOReceiptGenerated $dto)
    {
        parent::__construct($dto);

        $this->id = $dto->data['id'];
        $this->stateID = $dto->data['stateID'];
        $this->externalURL = $dto->data['externalURL'];
        $this->externalIdent = $dto->data['externalIdent'];
        $this->externalRequestTime = $dto->data['externalRequestTime'];
        $this->externalError = $dto->data['externalError'];
    }
}