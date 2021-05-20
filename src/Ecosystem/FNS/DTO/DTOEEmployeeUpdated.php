<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO;

use Illuminate\Validation\ValidationException;
use Qugo\RabbitMQTransfer\BaseDTO;
use Qugo\RabbitMQTransfer\Rules\InnFlRule;

/**
 * Class DTOWorkmanUpdatedStatus
 *
 * @package Qugo\RabbitMQTransfer\DTO
 */
class DTOEEmployeeUpdated extends BaseDTO
{
    const WORKMAN_STATUS_CHECKING         = 'CHECKING';
    const WORKMAN_STATUS_UNKNOWN          = 'UNKNOWN';
    const WORKMAN_STATUS_NOTSE            = 'NOTSE';
    const WORKMAN_STATUS_NO_ACCESS        = 'NOACCESS';
    const WORKMAN_STATUS_LIMITED          = 'LIMITED';
    const WORKMAN_STATUS_VALIDATION_ERROR = 'VALIDATION_ERROR';
    const WORKMAN_STATUS_OK               = 'OK';
    const WORKMAN_STATUS_DAILY_CHECKING   = 'CHECKING';

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
    ) {
        parent::__construct((object)[
            'inn'                 => $inn,
            'status'              => $status,
            'accessTaxPayment'    => $accessTaxPayment,
            'externalDescription' => $externalDescription,
            'externalDate'        => $externalDate,
        ]);
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'inn'                 => [
                'required',
                new InnFlRule(),
            ],
            'status'              => 'required|in:' . implode(',', [
                    self::WORKMAN_STATUS_CHECKING,
                    self::WORKMAN_STATUS_UNKNOWN,
                    self::WORKMAN_STATUS_NOTSE,
                    self::WORKMAN_STATUS_NO_ACCESS,
                    self::WORKMAN_STATUS_LIMITED,
                    self::WORKMAN_STATUS_VALIDATION_ERROR,
                    self::WORKMAN_STATUS_OK,
                    self::WORKMAN_STATUS_DAILY_CHECKING,
                ]),
            'externalDescription' => 'nullable|string',
            'externalDate'        => 'nullable|date',
            'accessTaxPayment'    => 'required|boolean',
        ];
    }
}
