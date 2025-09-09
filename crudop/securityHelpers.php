<?php

/**
 * Remove null bytes and HTML tags, and escape single and double quotes.
 *
 * @param string $string The input string to be sanitized.
 * @return string The sanitized string.
 */
function filter_string_polyfill(string $string): string {
    $string = trim($string);  // Trim the string first
    $str = preg_replace('/\x00|<[^>]*>?/', '', $string);
    return str_replace(["'", '"'], ['&#39;', '&#34;'], $str);
}

/**
 * Sanitize a string input using htmlspecialchars, strip_tags, and trim.
 *
 * @param mixed $data The input data to be sanitized.
 * @return mixed The sanitized data.
 */
function stringsantize($data) {
    return htmlspecialchars(strip_tags(trim($data)));  // Trim the string before sanitization
}

/**
 * Sanitize an integer input.
 *
 * @param mixed $data The input data to be sanitized.
 * @return int The sanitized integer.
 */
function integersantize($data) {
    $data = trim($data);  // Trim the data first
    return filter_var($data, FILTER_SANITIZE_NUMBER_INT);
}

/**
 * Sanitize an email address.
 *
 * @param string $data The email address to be sanitized.
 * @return string The sanitized email address.
 */
function emailsantize($data) {
    $data = trim($data);  // Trim the email address
    return filter_var($data, FILTER_SANITIZE_EMAIL);
}

/**
 * Sanitize a URL.
 *
 * @param string $data The URL to be sanitized.
 * @return string The sanitized URL.
 */
function urlsanitize($data) {
    $data = trim($data);  // Trim the URL
    return filter_var($data, FILTER_SANITIZE_URL);
}

/**
 * Sanitize a float input.
 *
 * @param mixed $data The input data to be sanitized.
 * @return float The sanitized float value.
 */
function floatsantize($data) {
    $data = trim($data);  // Trim the float value
    return filter_var($data, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

/**
 * Generate a random string of specified length.
 *
 * @param int $length The length of the random string.
 * @return string The generated random string.
 */
function generate_secure_string($length = 16) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $characters_length = strlen($characters);
    
    // Generate cryptographically secure random bytes
    $random_bytes = random_bytes($length);
    $random_string = '';

    for ($i = 0; $i < $length; $i++) {
        // Use a byte from the random bytes to index into the characters string
        $random_index = ord($random_bytes[$i]) % $characters_length;
        $random_string .= $characters[$random_index];
    }

    return $random_string;
}

/**
 * Format a date into "d-m-Y" format.
 *
 * @param string $a The date string to be formatted.
 * @return string The formatted date.
 */
function ModifiedDateformate($a) {
    $a = trim($a);  // Trim the date string
    $date = date("d-m-Y", strtotime($a));
    return $date;
}

?>
