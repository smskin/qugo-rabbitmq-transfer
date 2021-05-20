<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Commands;

use Qugo\RabbitMQTransfer\BaseCommand;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOCreateReceipt;

/**
 * Class CreateReceipt
 * @package Qugo\RabbitMQTransfer\Ecosystem\FNS\Commands
 */
class CreateReceipt extends BaseCommand
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
     * @param DTOCreateReceipt $dto
     */
    public function __construct(DTOCreateReceipt $dto)
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
