<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO;

use Illuminate\Validation\ValidationException;
use Qugo\RabbitMQTransfer\BaseDTO;

/**
 * Class DTOEReceiptReversed
 *
 * @package Qugo\RabbitMQTransfer\DTO
 */
class DTOEReceiptReversed extends BaseDTO
{
    /**
     * DTOReceiptGenerated constructor.
     *
     * @param int $id
     * @param string|null $externalRequestTime
     * @param string $reason
     * @throws ValidationException
     */
    public function __construct(
        int $id,
        ?string $externalRequestTime,
        string $reason
    ) {
        parent::__construct((object)[
            'id' => $id,
            'externalRequestTime' => $externalRequestTime,
            'reason' => $reason
        ]);
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id'                  => 'required|integer',
            'externalRequestTime' => 'required|string',
            'reason'       => 'required|string|min:5',
        ];
    }
}
