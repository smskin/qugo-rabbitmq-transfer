<?php

namespace Qugo\RabbitMQTransfer\Ecosystem\FNS\DTO;

use Illuminate\Validation\ValidationException;
use Qugo\RabbitMQTransfer\BaseDTO;

/**
 * Class DTOEReceiptCreated
 *
 * @package Qugo\RabbitMQTransfer\DTO
 */
class DTOEReceiptCreated extends BaseDTO
{
    /**
     * DTOReceiptGenerated constructor.
     *
     * @param int $id
     * @param string|null $externalURL
     * @param string|null $externalIDent
     * @param string|null $externalRequestTime
     * @throws ValidationException
     */
    public function __construct(
        int $id,
        string $externalURL,
        string $externalIDent,
        ?string $externalRequestTime
    ) {
        parent::__construct((object)[
            'id'                  => $id,
            'externalURL'         => $externalURL,
            'externalIDent'       => $externalIDent,
            'externalRequestTime' => $externalRequestTime
        ]);
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id'                  => 'required|integer',
            'externalURL'         => 'required|string',
            'externalIDent'       => 'required|string',
            'externalRequestTime' => 'nullable|string'
        ];
    }
}
