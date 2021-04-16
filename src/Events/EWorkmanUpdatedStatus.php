<?php

namespace Qugo\RabbitMQTransfer\Events;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\DTO\DTOWorkmanUpdatedStatus;

/**
 * Class EWorkmanUpdatedStatus
 *
 * @package Qugo\RabbitMQTransfer\Events
 */
class EWorkmanUpdatedStatus extends BaseEvent
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
     * @param DTOWorkmanUpdatedStatus $dto
     */
    public function __construct(DTOWorkmanUpdatedStatus $dto)
    {
        parent::__construct($dto);
        $this->inn = $dto->data['inn'];
        $this->status = $dto->data['status'];
        $this->externalDescription = $dto->data['externalDescription'];
        $this->externalDate = $dto->data['externalDate'];
        $this->accessTaxPayment = $dto->data['accessTaxPayment'];
    }
}
