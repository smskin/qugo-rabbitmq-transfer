<?php

namespace Qugo\RabbitMQTransfer\Events;

use Qugo\RabbitMQTransfer\DTO\DTOWorkmanCreated;
use Qugo\RabbitMQTransfer\BaseEvent;

/**
 * Class EWorkmanCreated
 *
 * @package Qugo\RabbitMQTransfer\Events
 */
class EWorkmanCreated extends BaseEvent
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
     * EWorkmanCreated constructor.
     *
     * @param DTOWorkmanCreated $dto
     */
    public function __construct(DTOWorkmanCreated $dto)
    {
        parent::__construct($dto);
        $this->inn = $dto->data['inn'];
        $this->phone = $dto->data['phone'];
        $this->email = $dto->data['email'];
        $this->firstName = $dto->data['firstName'];
        $this->lastName = $dto->data['lastName'];
        $this->middleName = $dto->data['middleName'];
    }
}
