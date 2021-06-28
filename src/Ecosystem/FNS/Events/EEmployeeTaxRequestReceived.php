<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Events;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOEEmployeeTaxRequestReceived;

/**
 * Class EEmployeeTaxRequestReceived
 * @package Qugo\RabbitMQTransfer\Events
 */
class EEmployeeTaxRequestReceived extends BaseEvent
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
     * @param DTOEEmployeeTaxRequestReceived $dto
     */
    public function __construct(DTOEEmployeeTaxRequestReceived $dto)
    {
        $this->inn = $dto->data['inn'];
        $this->requestDate = $dto->data['requestDate'];
        $this->documents = $dto->data['documents'];
        parent::__construct($dto);
    }
}
