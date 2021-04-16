<?php

namespace Qugo\RabbitMQTransfer\DTO;

use Illuminate\Validation\ValidationException;
use Qugo\RabbitMQTransfer\BaseDTO;
use Qugo\RabbitMQTransfer\Rules\InnRule;

/**
 * Class DTOFNSNotificationCreated
 *
 * @package Qugo\RabbitMQTransfer\DTO
 */
class DTOFNSNotificationCreated extends BaseDTO
{

    /**
     * DTOFNSNotificationCreated constructor.
     *
     * @param int $external_id
     * @param string $inn
     * @param string $title
     * @param string $text
     * @param string $created_at
     * @throws ValidationException
     */
    public function __construct(
        int $external_id,
        string $inn,
        string $title,
        string $text,
        string $created_at
    )
    {
        parent::__construct((object) [
            'external_id' => $external_id,
            'inn' => $inn,
            'created_at' => $created_at,
            'title' => $title,
            'text' => $text,
        ]);
    }

    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return [
            'external_id' => 'required|integer',
            'inn' => [
                'required',
                new InnRule()
            ],
            'created_at' => 'required|date',
            'title' => 'required|string',
            'text' => 'required|string'
        ];
    }
}
