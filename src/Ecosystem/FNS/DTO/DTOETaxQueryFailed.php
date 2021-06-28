<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO;

use Illuminate\Validation\ValidationException;
use Qugo\RabbitMQTransfer\BaseDTO;
use Qugo\RabbitMQTransfer\Rules\InnRule;

/**
 * Class DTOETaxQueryFailed
 *
 * @package Qugo\RabbitMQTransfer\DTO
 */
class DTOETaxQueryFailed extends BaseDTO
{
    /**
     * DTOETaxQueryFailed constructor.
     *
     * @param string $inn
     * @param string $requestDate
     * @param string $reason
     * @throws ValidationException
     */
    public function __construct(
        string $inn,
        string $requestDate,
        string $reason
    ) {
        parent::__construct((object)[
            'inn' => $inn,
            'requestDate' => $requestDate,
            'reason' => $reason,
        ]);
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'inn'         => [
                'required',
                'string',
                new InnRule(),
            ],
            'requestDate' => 'required|string|date',
            'reason' => 'required|string|min:3'
        ];
    }
}
