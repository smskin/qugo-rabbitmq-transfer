<?php


namespace Qugo\RabbitMQTransfer\Events;


use Qugo\RabbitMQTransfer\BaseDTO;
use Qugo\RabbitMQTransfer\BaseEvent;

class EFNSNotificationCreated extends BaseEvent
{
    /**
     * @var int
     */
    public $external_id;

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
    public $created_at;

    public function __construct(BaseDTO $dto)
    {
        parent::__construct($dto);
        $this->external_id = $dto->data['external_id'];
        $this->inn = $dto->data['inn'];
        $this->title = $dto->data['title'];
        $this->text = $dto->data['text'];
        $this->created_at = $dto->data['created_at'];
    }
}
