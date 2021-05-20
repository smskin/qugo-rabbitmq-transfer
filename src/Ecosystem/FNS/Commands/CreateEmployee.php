<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Commands;

use Qugo\RabbitMQTransfer\BaseCommand;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOCreateEmployee;

/**
 * Class CreateEmployee
 * @package Qugo\RabbitMQTransfer\Ecosystem\FNS\Commands
 */
class CreateEmployee extends BaseCommand
{
    /**
     * @var string
     */
    public $inn;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $firstName;

    /**
     * @var string
     */
    public $lastName;

    /**
     * @var null|string
     */
    public $middleName;

    /**
     * @var bool
     */
    public $noMiddleName;

    /**
     * EWorkmanCreated constructor.
     *
     * @param DTOCreateEmployee $dto
     */
    public function __construct(DTOCreateEmployee $dto)
    {
        parent::__construct($dto);
        $this->inn = $dto->data['inn'];
        $this->phone = $dto->data['phone'];
        $this->email = $dto->data['email'];
        $this->firstName = $dto->data['firstName'];
        $this->lastName = $dto->data['lastName'];
        $this->middleName = $dto->data['middleName'];
        $this->noMiddleName = $dto->data['noMiddleName'];
    }
}
