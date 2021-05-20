<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Events;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOEEmployeeUpdated;

/**
 * Class EEmployeeUpdated
 * @package Qugo\RabbitMQTransfer\Ecosystem\FNS\Events
 */
class EEmployeeUpdated extends BaseEvent
{
    /**
     * @var string
     */
    public $inn;

    /**
     * @var string
     */
    public $status;

    /**
     * @var null|string
     */
    public $externalDescription;

    /**
     * @var null|string
     */
    public $externalDate;

    /**
     * @var bool
     */
    public $accessTaxPayment;

    /**
     * EWorkmanUpdatedStatus constructor.
     *
     * @param DTOEEmployeeUpdated $dto
     */
    public function __construct(DTOEEmployeeUpdated $dto)
    {
        parent::__construct($dto);
        $this->inn = $dto->data['inn'];
        $this->status = $dto->data['status'];
        $this->externalDescription = $dto->data['externalDescription'];
        $this->externalDate = $dto->data['externalDate'];
        $this->accessTaxPayment = $dto->data['accessTaxPayment'];
    }
}
