<?php

namespace ACAT\Commons\Validator;

/**
 * describes any value for validation messages without triggering conversion warnings
 */
final class ValueDescription {

    /**
     * @param mixed $value
     * @return string
     */
    public static function of(mixed $value): string {
        if (is_scalar($value) || $value instanceof \Stringable) {
            return "'" . $value . "'";
        }
        return get_debug_type($value);
    }
}
