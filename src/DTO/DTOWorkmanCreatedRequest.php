<?php

namespace Qugo\RabbitMQTransfer\DTO;

use Qugo\RabbitMQTransfer\BaseDTO;
use Illuminate\Validation\ValidationException;
use Qugo\RabbitMQTransfer\Rules\InnRule;

/**
 * Class DTOWorkmanCreatedRequest
 *
 * @package Qugo\RabbitMQTransfer\DTO
 */
class DTOWorkmanCreatedRequest extends BaseDTO
{
    /**
     * @var bool
     */
    private $noMiddleName;

    /**
     * DTOWorkmanCreatedRequest constructor.
     *
     * @param string $phone
     * @param string $email
     * @param string $inn
     * @param string $firstName
     * @param string $lastName
     * @param bool $noMiddleName
     * @param string|null $middleName
     * @throws ValidationException
     */
    public function __construct(string $phone, string $email, string $inn, string $firstName, string $lastName, bool $noMiddleName = true, ?string $middleName = null)
    {
        $this->noMiddleName = $noMiddleName;
        parent::__construct((object) [
            'phone' => $phone,
            'email' => $email,
            'inn' => $inn,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'middleName' => $middleName
        ]);
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'phone' => 'required|string|size:11',
            'email' => 'required|email',
            'inn' => [
                'required',
                new InnRule()
            ],
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'middleName' => $this->noMiddleName ? 'nullable' : 'required|string',
        ];
    }
}
