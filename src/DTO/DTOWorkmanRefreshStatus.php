<?php

namespace Qugo\RabbitMQTransfer\DTO;

use Illuminate\Validation\ValidationException;
use Qugo\RabbitMQTransfer\BaseDTO;

/**
 * Class DTOWorkmanToUnknown
 *
 * @package Qugo\RabbitMQTransfer\DTO
 */
class DTOWorkmanRefreshStatus extends BaseDTO
{
    /**
     * DTOWorkmanToUnknown constructor.
     *
     * @param string $inn
     * @throws ValidationException
     */
    public function __construct(string $inn)
    {
        parent::__construct((object) [
            'inn' => $inn
        ]);
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'inn' => 'required'
        ];
    }
}
