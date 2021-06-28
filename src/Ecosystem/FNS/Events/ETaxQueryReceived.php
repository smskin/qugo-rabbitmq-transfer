<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Events;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOTaxQueryReceived;

/**
 * Class ETaxQueryReceived
 * @package Qugo\RabbitMQTransfer\Events
 */
class ETaxQueryReceived extends BaseEvent
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
     * ETaxQueryReceived constructor.
     *
     * @param DTOTaxQueryReceived $dto
     */
    public function __construct(DTOTaxQueryReceived $dto)
    {
        $this->inn = $dto->data['inn'];
        $this->requestDate = $dto->data['requestDate'];
        $this->documents = $dto->data['documents'];
        parent::__construct($dto);
    }
}
