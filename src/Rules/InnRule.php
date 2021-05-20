<?php

namespace Qugo\RabbitMQTransfer\Rules;

use Illuminate\Contracts\Validation\Rule;

class InnRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return ((new InnFlRule())->passes($attribute, $value) || (new InnUlRule())->passes($attribute, $value));
    }

    public function message(): string
    {
        return 'Некорректный ИНН';
    }
}
