<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Commands;

use Qugo\RabbitMQTransfer\BaseCommand;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOMarkFNSNotificationAsRead;

/**
 * Class MarkFNSNotificationAsRead
 * @package Qugo\RabbitMQTransfer\Ecosystem\FNS\Commands
 */
class MarkFNSNotificationAsRead extends BaseCommand
{
    /**
     * @var string
     */
    public $externalID;

    /**
     * EFNSNotificationRead constructor.
     *
     * @param DTOMarkFNSNotificationAsRead $dto
     */
    public function __construct(DTOMarkFNSNotificationAsRead $dto)
    {
        parent::__construct($dto);
        $this->externalID = $dto->data['externalID'];
    }
}
