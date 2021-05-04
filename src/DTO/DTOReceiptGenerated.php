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
    const RECEIPT_STATE_ERROR            = 'ERROR';
    const RECEIPT_STATE_PENDING          = 'PENDING';
    const RECEIPT_STATE_OFFLINE          = 'OFFLINE';
    const RECEIPT_STATE_REVERSED         = 'REVERSED';
    const RECEIPT_STATE_COMPLETED        = 'COMPLETED';
    const RECEIPT_STATE_IN_PROGRESS      = 'INPROGRESS';
    const RECEIPT_STATE_NOT_REQUIRED     = 'NOT_REQUIRED';
    const RECEIPT_STATE_PENDING_REVERSED = 'PENDING_REVERSED';

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
    ) {
        parent::__construct((object)[
            'id'                  => $id,
            'stateID'             => $stateID,
            'externalURL'         => $externalURL,
            'externalIDent'       => $externalIDent,
            'externalRequestTime' => $externalRequestTime,
            'externalError'       => $externalError,
        ]);
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id'                  => 'required|integer',
            'stateID'             => 'required|in:' . implode(',', [
                    self::RECEIPT_STATE_ERROR,
                    self::RECEIPT_STATE_PENDING,
                    self::RECEIPT_STATE_OFFLINE,
                    self::RECEIPT_STATE_REVERSED,
                    self::RECEIPT_STATE_COMPLETED,
                    self::RECEIPT_STATE_IN_PROGRESS,
                    self::RECEIPT_STATE_NOT_REQUIRED,
                    self::RECEIPT_STATE_PENDING_REVERSED,
                ]),
            'externalURL'         => 'nullable|string',
            'externalIDent'       => 'nullable|string',
            'externalRequestTime' => 'nullable|string',
            'externalError'       => 'nullable|string',
        ];
    }
}
