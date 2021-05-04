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
    const RECEIPT_INCOME_TYPE_FROM_INDIVIDUAL     = 'FROM_INDIVIDUAL';
    const RECEIPT_INCOME_TYPE_FROM_LEGAL_ENTITY   = 'FROM_LEGAL_ENTITY';
    const RECEIPT_INCOME_TYPE_FROM_FOREIGN_AGENCY = 'FROM_FOREIGN_AGENCY';

    /**
     * DTOReceiptCreated constructor.
     *
     * @param int $id
     * @param string $workmanINN
     * @param string $customerINN
     * @param string $customerName
     * @param array $services
     * @param string $incomeType
     * @param string $date
     * @throws ValidationException
     */
    public function __construct(
        int $id,
        string $workmanINN,
        string $customerINN,
        string $customerName,
        array $services,
        string $incomeType,
        string $date
    ) {
        parent::__construct((object)[
            'id'           => $id,
            'workmanINN'   => $workmanINN,
            'customerINN'  => $customerINN,
            'customerName' => $customerName,
            'services'     => $services,
            'incomeType'   => $incomeType,
            'date'         => $date,
        ]);
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'id'                  => 'required|integer',
            'workmanINN'          => [
                'required',
                new InnFlRule(),
            ],
            'customerINN'         => [
                'required',
                new InnRule(),
            ],
            'customerName'        => 'required|string',
            'services'            => 'required|array',
            'services.*.name'     => 'required|string',
            'services.*.amount'   => 'required|numeric',
            'services.*.quantity' => 'required|integer',
            'incomeType'          => 'required|in:' . implode(',', [
                    self::RECEIPT_INCOME_TYPE_FROM_INDIVIDUAL,
                    self::RECEIPT_INCOME_TYPE_FROM_LEGAL_ENTITY,
                    self::RECEIPT_INCOME_TYPE_FROM_FOREIGN_AGENCY,
                ]),
            'date'                => 'required|date',
        ];
    }
}
