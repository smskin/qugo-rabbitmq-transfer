<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO;

use Illuminate\Validation\ValidationException;
use Qugo\RabbitMQTransfer\BaseDTO;
use Qugo\RabbitMQTransfer\Rules\InnRule;

/**
 * Class DTOCreateTaxQuery
 *
 * @package Qugo\RabbitMQTransfer\DTO
 */
class DTOCreateTaxQuery extends BaseDTO
{
    /**
     * DTOCreateTaxQuery constructor.
     *
     * @param string $inn
     * @throws ValidationException
     */
    public function __construct(
        string $inn
    ) {
        parent::__construct((object)[
            'inn' => $inn,
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
        ];
    }
}
