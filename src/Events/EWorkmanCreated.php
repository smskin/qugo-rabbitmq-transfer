<?php

namespace Qugo\RabbitMQTransfer\Events;

use Qugo\RabbitMQTransfer\DTO\DTOWorkmanCreatedRequest;
use Qugo\RabbitMQTransfer\BaseEvent;

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
     * @param DTOWorkmanCreatedRequest $dto
     */
    public function __construct(DTOWorkmanCreatedRequest $dto)
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
