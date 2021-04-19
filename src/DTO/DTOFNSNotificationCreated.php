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
     * @param bool $isRead
     * @param string|null $readAt
     * @throws ValidationException
     */
    public function __construct(
        int $externalID,
        string $inn,
        string $title,
        string $text,
        string $createdAt,
        bool $isRead,
        ?string $readAt
    )
    {
        parent::__construct((object) [
            'externalID' => $externalID,
            'inn' => $inn,
            'createdAt' => $createdAt,
            'title' => $title,
            'text' => $text,
            'isRead' => $isRead,
            'readAt' => $readAt
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
            'text' => 'required|string',
            'isRead' => 'required|boolean',
            'readAt' => 'nullable|date'
        ];
    }
}
