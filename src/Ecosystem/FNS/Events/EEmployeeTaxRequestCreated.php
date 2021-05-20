<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Events;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOEEmployeeTaxRequestCreated;

/**
 * Class EWorkmanTaxRequestCreate
 * @package Qugo\RabbitMQTransfer\Events
 */
class EEmployeeTaxRequestCreated extends BaseEvent
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
     * @param DTOEEmployeeTaxRequestCreated $dto
     */
    public function __construct(DTOEEmployeeTaxRequestCreated $dto)
    {
        $this->inn = $dto->data['inn'];
        $this->requestDate = $dto->data['requestDate'];
        $this->documents = $dto->data['documents'];
        parent::__construct($dto);
    }
}
