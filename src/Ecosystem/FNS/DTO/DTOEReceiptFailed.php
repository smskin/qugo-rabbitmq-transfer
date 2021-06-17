<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO;

use Illuminate\Validation\ValidationException;
use Qugo\RabbitMQTransfer\BaseDTO;

/**
 * Class DTOEReceiptFailed
 *
 * @package Qugo\RabbitMQTransfer\DTO
 */
class DTOEReceiptFailed extends BaseDTO
{
    /**
     * DTOReceiptGenerated constructor.
     *
     * @param int $id
     * @param string|null $externalRequestTime
     * @param string $externalError
     * @throws ValidationException
     */
    public function __construct(
        int $id,
        ?string $externalRequestTime,
        string $externalError
    ) {
        parent::__construct((object)[
            'id'                  => $id,
            'externalRequestTime' => $externalRequestTime,
            'externalError' => $externalError
        ]);
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id'                  => 'required|integer',
            'externalRequestTime' => 'nullable|string',
            'externalError'       => 'nullable|string',
        ];
    }
}
