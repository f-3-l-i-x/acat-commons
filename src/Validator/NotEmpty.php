<?php

namespace ACAT\Commons\Validator;

use Attribute;
use ACAT\Dto\Validator;
use ACAT\Dto\Validation\ValidationResult;

/**
 *
 */
#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
final class NotEmpty implements Validator {

    /**
     * @param mixed $value
     * @return ValidationResult
     */
    public function validate(mixed $value): ValidationResult {
        if (empty($value)) {
            return ValidationResult::invalid(ValueDescription::of($value) . " is empty");
        }
        return ValidationResult::valid();
    }
}