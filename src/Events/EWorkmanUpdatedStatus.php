<?php

namespace Qugo\RabbitMQTransfer\Events;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\DTO\DTOWorkmanUpdatedStatus;


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
    public $external_description;

    /**
     * @var null|string
     */
    public $external_date;

    /**
     * @var bool
     */
    public $access_tax_payment;

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
        $this->external_description = $dto->data['external_description'];
        $this->external_date = $dto->data['external_date'];
        $this->access_tax_payment = $dto->data['access_tax_payment'];
    }
}
