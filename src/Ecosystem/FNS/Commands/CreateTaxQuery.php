<?php


namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Commands;


use Qugo\RabbitMQTransfer\BaseCommand;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOCreateTaxQuery;

/**
 * Class EEmployeeTaxRequestCreate
 * @package Qugo\RabbitMQTransfer\Ecosystem\FNS\Commands
 */
class CreateTaxQuery extends BaseCommand
{
    /**
     * @var string
     */
    public $inn;

    /**
     * EWorkmanTaxRequestCreate constructor.
     *
     * @param DTOCreateTaxQuery $dto
     */
    public function __construct(DTOCreateTaxQuery $dto)
    {
        $this->inn = $dto->data['inn'];
        parent::__construct($dto);
    }
}
