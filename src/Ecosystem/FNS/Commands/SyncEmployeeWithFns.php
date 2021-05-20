<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\Commands;

use Qugo\RabbitMQTransfer\BaseCommand;
use Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO\DTOSyncEmployeeWithFns;

/**
 * Class SyncEmployeeWithFns
 * @package Qugo\RabbitMQTransfer\Ecosystem\FNS\Commands
 */
class SyncEmployeeWithFns extends BaseCommand
{
    /**
     * @var
     */
    public $inn;

    /**
     * EWorkmanToUnknown constructor.
     *
     * @param DTOSyncEmployeeWithFns $dto
     */
    public function __construct(DTOSyncEmployeeWithFns $dto)
    {
        $this->inn = $dto->data['inn'];
        parent::__construct($dto);
    }
}
