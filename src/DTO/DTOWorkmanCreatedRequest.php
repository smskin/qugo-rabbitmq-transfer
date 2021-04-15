<?php

namespace Qugo\RabbitMQTransfer\DTO;

use Qugo\RabbitMQTransfer\BaseDTO;
use Illuminate\Validation\ValidationException;

/**
 * Class DTOWorkmanCreatedRequest
 *
 * @package Qugo\RabbitMQTransfer\DTO
 */
class DTOWorkmanCreatedRequest extends BaseDTO
{
    /**
     * DTOWorkmanCreatedRequest constructor.
     *
     * @param string $inn
     * @throws ValidationException
     */
    public function __construct(string $inn)
    {
        parent::__construct((object) ['inn' => $inn]);
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'inn' => 'required',
        ];
    }
}
