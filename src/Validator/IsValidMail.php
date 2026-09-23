<?php

namespace ACAT\Commons\Validator;

use Attribute;
use ACAT\Dto\Validator;
use ACAT\Dto\Validation\ValidationResult;

/**
 *
 */
#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
class IsValidMail implements Validator {

    /**
     * @param mixed $value
     * @return ValidationResult
     */
    public function validate(mixed $value): ValidationResult {
        if (!empty($value) && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return ValidationResult::invalid(ValueDescription::of($value) . " isn't a valid mail");
        }
        return ValidationResult::valid();
    }
}