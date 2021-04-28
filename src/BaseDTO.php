<?php

namespace Qugo\RabbitMQTransfer;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Validation\Validator;

/**
 * Class BaseDTO
 *
 * @package Qugo\RabbitMQTransfer\DTO
 */
abstract class BaseDTO
{
    /**
     * @var array
     */
    public $data = [];

    /**
     * BaseDTO constructor.
     *
     * @param object $data
     * @throws ValidationException
     */
    public function __construct(object $data)
    {
        $validator = $this->getValidator($data);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        $this->data = $validator->validated();
    }

    /**
     * @return string
     */
    final public function serialize(): string
    {
        return json_encode($this->data);
    }

    /**
     * @param string $json
     * @return object
     */
    final public static function unSerialize(string $json): array
    {
        return json_decode($json, true);
    }

    /**
     * @return array
     */
    abstract public function rules(): array;

    /**
     * @param object $data
     * @return Validator
     */
    private function getValidator(object $data): Validator
    {
        return ValidatorFacade::make((array) $data, $this->rules());
    }
}
