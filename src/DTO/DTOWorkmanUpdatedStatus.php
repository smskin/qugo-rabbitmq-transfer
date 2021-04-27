<?php

namespace Qugo\RabbitMQTransfer\DTO;

use Illuminate\Validation\ValidationException;
use Qugo\RabbitMQTransfer\BaseDTO;
use Qugo\RabbitMQTransfer\Rules\InnFlRule;

/**
 * Class DTOWorkmanUpdatedStatus
 *
 * @package Qugo\RabbitMQTransfer\DTO
 */
class DTOWorkmanUpdatedStatus extends BaseDTO
{
    /**
     * @var string[]
     */
    private $statuses = [
        'CHECKING',
        'UNKNOWN',
        'NOTSE',
        'NOACCESS',
        'LIMITED',
        'VALIDATION_ERROR',
        'OK',
        'DAILY_CHECKING',
    ];

    /**
     * DTOWorkmanUpdateStatus constructor.
     *
     * @param string $inn
     * @param string $status
     * @param bool $accessTaxPayment
     * @param string|null $externalDescription
     * @param string|null $externalDate
     * @throws ValidationException
     */
    public function __construct(
        string $inn,
        string $status,
        bool $accessTaxPayment = false,
        string $externalDescription = null,
        string $externalDate = null
    )
    {
        parent::__construct((object)[
            'inn' => $inn,
            'status' => $status,
            'accessTaxPayment' => $accessTaxPayment,
            'externalDescription' => $externalDescription,
            'externalDate' => $externalDate,
        ]);
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'inn'                  => [
                'required',
                new InnFlRule()
            ],
            'status'               => 'required|in:'.implode(',', $this->statuses),
            'externalDescription' => 'nullable|string',
            'externalDate'        => 'nullable|date',
            'accessTaxPayment'   => 'required|boolean',
        ];
    }
}
