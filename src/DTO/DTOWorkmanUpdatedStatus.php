<?php

namespace Qugo\RabbitMQTransfer\DTO;

use Illuminate\Validation\ValidationException;
use Qugo\RabbitMQTransfer\BaseDTO;
use Qugo\RabbitMQTransfer\Rules\InnFlRule;

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
     * @param bool $access_tax_payment
     * @param string|null $external_description
     * @param string|null $external_date
     * @throws ValidationException
     */
    public function __construct(
        string $inn,
        string $status,
        bool $access_tax_payment = false,
        string $external_description = null,
        string $external_date = null
    )
    {
        parent::__construct((object)[
            'inn' => $inn,
            'status' => $status,
            'external_description' => $external_description,
            'external_date' => $external_date,
            'access_tax_payment' => $access_tax_payment
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
            'external_description' => 'nullable|string',
            'external_date'        => 'nullable|date',
            'access_tax_payment'   => 'required|boolean',
        ];
    }
}
