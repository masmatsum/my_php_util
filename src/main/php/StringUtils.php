<?php

class StringUtils {

    const EMPTY_STR = '';

    /**
     * @param string $str
     * @return bool true, if $str is null or empty string. false otherwise.
     */
    public static function isEmpty($str) {
        if ($str === null) {
            return true;
        }
        return $str === self::EMPTY_STR;
    }

    public static function isNotEmpty($str) {
        return !self::isEmpty($str);
    }

    /**
     * @param string $str
     * @return bool true, if $str is null, empty string or whitespace. false otherwise.
     */
    public static function isBlank($str) {
        return \trim($str) === self::EMPTY_STR;
    }

    public static function isNotBlank($str) {
        return !self::isBlank($str);
    }

    /**
     * Trims string, keeping `null` as is.
     *     StringUtils::trim(null);          // null
     *     StringUtils::trim('');            // ''
     *     StringUtils::trim('     ');       // ''
     *     StringUtils::trim('abc');         // 'abc'
     * @param string $str
     * @return string
     */
    public static function trim($str) {
        return self::isEmpty($str)
            ? $str
            : \trim($str);
    }


    /**
     * @param string $str
     * @return bool
     */
    public static function isIntFormat($str) {
        if (self::isEmpty($str)) {
            return false;
        }
        if ($str[0] === '-') {
            return \ctype_digit(substr($str, 1));
        }
        return \ctype_digit($str);
    }

    /**
     * @param string $str
     * @param int $defaultValue
     * @return int
     */
    public static function parseInt($str, $defaultValue = null) {
        return self::isIntFormat($str) ? \intval($str) : $defaultValue;
    }

}
