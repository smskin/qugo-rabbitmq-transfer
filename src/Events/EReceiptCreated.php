<?php

namespace Qugo\RabbitMQTransfer\Events;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\DTO\DTOReceiptCreated;

/**
 * Class EReceiptCreated
 *
 * @package Qugo\RabbitMQTransfer\Events
 */
class EReceiptCreated extends BaseEvent
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $income_type;

    /**
     * @var string
     */
    public $workman_inn;

    /**
     * @var string
     */
    public $customer_inn;

    /**
     * @var string
     */
    public $customer_name;

    /**
     * @var array
     */
    public $services;

    /**
     * @var string
     */
    public $date;

    /**
     * EReceiptCreated constructor.
     *
     * @param DTOReceiptCreated $dto
     */
    public function __construct(DTOReceiptCreated $dto)
    {
        parent::__construct($dto);
        $this->id = $dto->data['id'];
        $this->income_type = $dto->data['income_type'];
        $this->workman_inn = $dto->data['workman_inn'];
        $this->customer_inn = $dto->data['customer_inn'];
        $this->customer_name = $dto->data['customer_name'];
        $this->services = $dto->data['services'];
        $this->date = $dto->data['date'];
    }
}
