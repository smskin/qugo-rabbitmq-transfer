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
    public $incomeType;

    /**
     * @var string
     */
    public $workmanINN;

    /**
     * @var string
     */
    public $customerINN;

    /**
     * @var string
     */
    public $customerName;

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
        $this->incomeType = $dto->data['incomeType'];
        $this->workmanINN = $dto->data['workmanINN'];
        $this->customerINN = $dto->data['customerINN'];
        $this->customerName = $dto->data['customerName'];
        $this->services = $dto->data['services'];
        $this->date = $dto->data['date'];
    }
}
