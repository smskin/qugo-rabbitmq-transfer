<?php

namespace Qugo\RabbitMQTransfer\DTO;

use Illuminate\Validation\ValidationException;
use Qugo\RabbitMQTransfer\BaseDTO;
use Qugo\RabbitMQTransfer\Rules\InnFlRule;
use Qugo\RabbitMQTransfer\Rules\InnRule;

/**
 * Class DTOReceiptCreated
 *
 * @package Qugo\RabbitMQTransfer\DTO
 */
class DTOReceiptCreated extends BaseDTO
{
    /**
     * Available income_types
     *
     * @var string[]
     */
    private $income_types = [
        'FROM_INDIVIDUAL',
        'FROM_LEGAL_ENTITY',
        'FROM_FOREIGN_AGENCY'
    ];

    /**
     * DTOReceiptCreated constructor.
     *
     * @param int $id
     * @param string $workman_inn
     * @param string $customer_inn
     * @param string $customer_name
     * @param array $services
     * @param string $income_type
     * @param string $date
     * @throws ValidationException
     */
    public function __construct(
        int $id,
        string $workman_inn,
        string $customer_inn,
        string $customer_name,
        array $services,
        string $income_type,
        string $date
    )
    {
        parent::__construct((object)[
            'id' => $id,
            'workman_inn' => $workman_inn,
            'customer_inn' => $customer_inn,
            'customer_name' => $customer_name,
            'services' => $services,
            'income_type' => $income_type,
            'date' => $date,
        ]);
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer',
            'workman_inn' => [
                'required',
                new InnFlRule()
            ],
            'customer_inn' => [
                'required',
                new InnRule()
            ],
            'customer_name' => 'required|string',
            'services' => 'required|array',
            'services.*.name' => 'required|string',
            'services.*.amount' => 'required|numeric',
            'services.*.quantity' => 'required|integer',
            'income_type' => 'required|in:'.implode($this->income_types),
            'date' => 'required|date'
        ];
    }
}
