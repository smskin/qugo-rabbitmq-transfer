<?php

namespace Qugo\RabbitMQTransfer\DTO;

use Illuminate\Validation\ValidationException;
use Qugo\RabbitMQTransfer\BaseDTO;

/**
 * Class DTOReceiptGenerated
 *
 * @package Qugo\RabbitMQTransfer\DTO
 */
class DTOReceiptGenerated extends BaseDTO
{
    /**
     * @var string[]
     */
    private $states = [
        'NOT_REQUIRED',
        'PENDING',
        'INPROGRESS',
        'COMPLETED',
        'ERROR',
        'REVERSED',
        'PENDING_REVERSED',
        'OFFLINE'
    ];

    /**
     * DTOReceiptGenerated constructor.
     *
     * @param int $id
     * @param string $stateID
     * @param string|null $externalURL
     * @param string|null $externalIDent
     * @param string|null $externalRequestTime
     * @param string|null $externalError
     * @throws ValidationException
     */
    public function __construct(
        int $id,
        string $stateID,
        ?string $externalURL,
        ?string $externalIDent,
        ?string $externalRequestTime,
        ?string $externalError
    )
    {
        parent::__construct((object) [
            'id' => $id,
            'stateID' => $stateID,
            'externalURL' => $externalURL,
            'externalIDent' => $externalIDent,
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
            'id' => 'required|integer',
            'stateID' => 'required|in:'.implode(',', $this->states),
            'externalURL' => 'nullable|string',
            'externalIDent' => 'nullable|string',
            'externalRequestTime' => 'nullable|string',
            'externalError' => 'nullable|string'
        ];
    }
}
