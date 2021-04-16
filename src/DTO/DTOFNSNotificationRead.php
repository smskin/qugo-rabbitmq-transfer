<?php


namespace Qugo\RabbitMQTransfer\DTO;


use Illuminate\Validation\ValidationException;
use Qugo\RabbitMQTransfer\BaseDTO;

class DTOFNSNotificationRead extends BaseDTO
{
    /**
     * DTOFNSNotificationRead constructor.
     *
     * @param string $fns_notification_id
     * @throws ValidationException
     */
    public function __construct(string $fns_notification_id)
    {
        parent::__construct((object) [
            'external_id' => $fns_notification_id
        ]);
    }

    public function rules(): array
    {
        return [
            'external_id' => 'required|string'
        ];
    }
}
