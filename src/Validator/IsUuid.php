<?php

namespace ACAT\Commons\Validator;

use Attribute;
use ACAT\Dto\Validator;
use Symfony\Component\Uid\Uuid;
use ACAT\Dto\Validation\ValidationResult;

/**
 *
 */
#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
final class IsUuid implements Validator {

    /**
     * @param mixed $value
     * @return ValidationResult
     */
    public function validate(mixed $value): ValidationResult {
        if (!empty($value) && (!is_string($value) || !Uuid::isValid($value))) {
            return ValidationResult::invalid(ValueDescription::of($value) . " isn't a valid uuid");
        }
        return ValidationResult::valid();
    }
}