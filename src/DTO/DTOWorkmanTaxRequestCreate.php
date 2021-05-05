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
            'documents.*.type'                       => 'required|string|in:' . implode(',', [
                    self::WORKMAN_TAX_REQUEST_DOCUMENT_TAX,
                    self::WORKMAN_TAX_REQUEST_DOCUMENT_DEBT,
                    self::WORKMAN_TAX_REQUEST_DOCUMENT_PENALTY,
                ]),
            'documents.*.documentIndex'              => 'required',
            'documents.*.fullName'                   => 'required',
            'documents.*.address'                    => 'required',
            'documents.*.amount'                     => 'required|numeric',
            'documents.*.recipientBankName'          => 'required',
            'documents.*.recipientBankBik'           => 'required',
            'documents.*.recipientBankAccountNumber' => 'required',
            'documents.*.recipient'                  => 'required',
            'documents.*.recipientAccountNumber'     => 'required',
            'documents.*.recipientInn'               => 'required',
            'documents.*.recipientKpp'               => 'required',
            'documents.*.kbk'                        => 'required',
            'documents.*.oktmo'                      => 'required',
            'documents.*.code101'                    => 'required',
            'documents.*.code106'                    => 'required',
            'documents.*.code107'                    => 'required',
            'documents.*.code110'                    => 'required',
            'documents.*.dueDate'                    => 'required|date',
            'documents.*.createTime'                 => 'required|date',
            'documents.*.sourceID'                   => 'required',
        ];
    }
}
