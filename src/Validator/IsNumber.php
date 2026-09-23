<?php

namespace ACAT\Commons\Validator;

use Attribute;
use ACAT\Dto\Validator;
use ACAT\Dto\Validation\ValidationResult;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
final class IsNumber implements Validator {

    /**
     * @var int|null
     */
    private ?int $minValue;

    /**
     * @param int|null $minValue
     */
    public function __construct(?int $minValue) {
        $this->minValue = $minValue;
    }

    /**
     * @param mixed $value
     * @return ValidationResult
     */
    public function validate(mixed $value) : ValidationResult {
       if (!is_numeric($value) || ($this->minValue) && $value < $this->minValue) {
           return ValidationResult::invalid(ValueDescription::of($value) . " isn't a valid number");
        }
        return ValidationResult::valid();
    }
}