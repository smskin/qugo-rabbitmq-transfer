<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Events;

use Qugo\RabbitMQTransfer\BaseEvent;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOEFNSNotificationCreated;

/**
 * Class EFNSNotificationCreated
 * @package Qugo\RabbitMQTransfer\Events
 */
class EFNSNotificationCreated extends BaseEvent
{
    /**
     * @var int
     */
    public $externalID;

    /**
     * @var string
     */
    public $inn;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $text;

    /**
     * @var string
     */
    public $createdAt;

    /**
     * @var bool
     */
    public $isRead;

    /**
     * @var string
     */
    public $readAt;

    /**
     * EFNSNotificationCreated constructor.
     *
     * @param DTOEFNSNotificationCreated $dto
     */
    public function __construct(DTOEFNSNotificationCreated $dto)
    {
        parent::__construct($dto);
        $this->externalID = $dto->data['externalID'];
        $this->inn = $dto->data['inn'];
        $this->title = $dto->data['title'];
        $this->text = $dto->data['text'];
        $this->createdAt = $dto->data['createdAt'];
        $this->isRead = $dto->data['isRead'];
        $this->readAt = $dto->data['readAt'];
    }
}
