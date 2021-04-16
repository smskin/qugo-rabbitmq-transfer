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
     * @param int $externalID
     * @param string $inn
     * @param string $title
     * @param string $text
     * @param string $createdAt
     * @throws ValidationException
     */
    public function __construct(
        int $externalID,
        string $inn,
        string $title,
        string $text,
        string $createdAt
    )
    {
        parent::__construct((object) [
            'externalID' => $externalID,
            'inn' => $inn,
            'createdAt' => $createdAt,
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
            'externalID' => 'required|integer',
            'inn' => [
                'required',
                new InnRule()
            ],
            'createdAt' => 'required|date',
            'title' => 'required|string',
            'text' => 'required|string'
        ];
    }
}
