<?php

namespace Qugo\RabbitMQTransfer\Events;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\DTO\DTOWorkmanTaxRequestCreate;

/**
 * Class EWorkmanTaxRequestCreate
 *
 * @package Qugo\RabbitMQTransfer\Events
 */
class EWorkmanTaxRequestCreate extends BaseEvent
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
     * @var array
     */
    public $documents;

    /**
     * EWorkmanTaxRequestCreate constructor.
     *
     * @param DTOWorkmanTaxRequestCreate $dto
     */
    public function __construct(DTOWorkmanTaxRequestCreate $dto)
    {
        $this->inn = $dto->data['inn'];
        $this->requestDate = $dto->data['requestDate'];
        $this->documents = $dto->data['documents'];
        parent::__construct($dto);
    }
}
