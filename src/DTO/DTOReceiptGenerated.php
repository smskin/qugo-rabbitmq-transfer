<?php


namespace Qugo\RabbitMQTransfer\DTO;


use Qugo\RabbitMQTransfer\BaseDTO;

class DTOReceiptGenerated extends BaseDTO
{
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
    public function __construct(
        int $id,
        string $stateID,
        ?string $externalURL,
        ?string $externalIdent,
        ?string $externalRequestTime,
        ?string $externalError
    )
    {
        parent::__construct((object) [
            'id' => $id,
            'stateID' => $stateID,
            'externalURL' => $externalURL,
            'externalIdent' => $externalIdent,
            'externalRequestTime' => $externalRequestTime,
            'externalError' => $externalError
        ]);
    }

    public function rules(): array
    {
        return [
            'id' => 'required|integer',
            'stateID' => 'required|in:'.implode(',', $this->states),
            'externalURL' => 'nullable|string',
            'externalIdent' => 'nullable|string',
            'externalRequestTime' => 'nullable|string',
            'externalError' => 'nullable|string'
        ];
    }
}
