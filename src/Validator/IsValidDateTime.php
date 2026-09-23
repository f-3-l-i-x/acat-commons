<?php

namespace ACAT\Commons\Validator;

use DateTime;
use Attribute;
use ACAT\Dto\Validator;
use ACAT\Dto\Validation\ValidationResult;

/**
 *
 */
#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
final class IsValidDateTime implements Validator {

    /**
     * @var string
     */
    private string $format;

    /**
     * @param string $format
     */
    public function __construct(string $format) {
        $this->format = $format;
    }

    /**
     * @param mixed $value
     * @return ValidationResult
     */
    public function validate(mixed $value) : ValidationResult {
        if (empty($value) || empty($this->format) || !is_string($value) || !DateTime::createFromFormat($this->format, $value)) {
            return ValidationResult::invalid(ValueDescription::of($value) . " isn't a valid date");
        }
        return ValidationResult::valid();
    }
}