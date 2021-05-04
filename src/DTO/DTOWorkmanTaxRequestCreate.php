<?php

namespace Qugo\RabbitMQTransfer\DTO;

use Illuminate\Validation\ValidationException;
use Qugo\RabbitMQTransfer\BaseDTO;
use Qugo\RabbitMQTransfer\Rules\InnRule;

/**
 * Class DTOWorkmanTaxRequestCreate
 *
 * @package Qugo\RabbitMQTransfer\DTO
 */
class DTOWorkmanTaxRequestCreate extends BaseDTO
{
    const WORKMAN_TAX_REQUEST_DOCUMENT_TAX     = 'TAX';
    const WORKMAN_TAX_REQUEST_DOCUMENT_DEBT    = 'DEBT';
    const WORKMAN_TAX_REQUEST_DOCUMENT_PENALTY = 'PENALTY';

    /**
     * DTOWorkmanTaxRequestCreate constructor.
     *
     * @param string $inn
     * @param string $requestDate
     * @param array $documents
     * @throws ValidationException
     */
    public function __construct(
        string $inn,
        string $requestDate,
        array $documents
    )
    {
        parent::__construct((object)[
            'inn'         => $inn,
            'requestDate' => $requestDate,
            'documents'   => $documents,
        ]);
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'inn'         => [
                'required',
                'string',
                new InnRule(),
            ],
            'requestDate' => 'required|string|date',
            'documents'   => 'required|array',
            'documents.*' => [
                'type'                       => 'required|string|in:' . implode(',', [
                        self::WORKMAN_TAX_REQUEST_DOCUMENT_TAX,
                        self::WORKMAN_TAX_REQUEST_DOCUMENT_DEBT,
                        self::WORKMAN_TAX_REQUEST_DOCUMENT_PENALTY,
                    ]),
                'documentIndex'              => 'required',
                'fullName'                   => 'required',
                'address'                    => 'required',
                'amount'                     => 'required|numeric',
                'recipientBankName'          => 'required',
                'recipientBankBik'           => 'required',
                'recipientBankAccountNumber' => 'required',
                'recipient'                  => 'required',
                'recipientAccountNumber'     => 'required',
                'recipientInn'               => 'required',
                'recipientKpp'               => 'required',
                'kbk'                        => 'required',
                'oktmo'                      => 'required',
                'code101'                    => 'required',
                'code106'                    => 'required',
                'code107'                    => 'required',
                'code110'                    => 'required',
                'dueDate'                    => 'required|date',
                'createTime'                 => 'required|date',
                'sourceID'                   => 'required',
            ],
        ];
    }
}
