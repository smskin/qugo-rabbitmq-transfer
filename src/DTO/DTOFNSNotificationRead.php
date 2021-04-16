<?php

namespace Qugo\RabbitMQTransfer\DTO;

use Illuminate\Validation\ValidationException;
use Qugo\RabbitMQTransfer\BaseDTO;

/**
 * Class DTOFNSNotificationRead
 *
 * @package Qugo\RabbitMQTransfer\DTO
 */
class DTOFNSNotificationRead extends BaseDTO
{
    /**
     * DTOFNSNotificationRead constructor.
     *
     * @param string $externalID
     * @throws ValidationException
     */
    public function __construct(string $externalID)
    {
        parent::__construct((object) [
            'externalID' => $externalID
        ]);
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'externalID' => 'required|string'
        ];
    }
}
