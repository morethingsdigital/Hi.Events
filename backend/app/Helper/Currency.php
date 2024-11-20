<?php

namespace HiEvents\Helper;

use NumberFormatter;

class Currency
{
    public static function format(float|int $amount, string $currencyCode, string $locale = 'en_US'): string
    {
        $currencyCode = strtoupper($currencyCode);
        $formatter = new NumberFormatter($locale . '@currency=' . $currencyCode, NumberFormatter::CURRENCY);
        return $formatter->formatCurrency($amount, $currencyCode);
    }

    public static function round(float $value, $precision = 2): float
    {
        $fraction = $value - floor($value);

        if ($fraction >= 0.99) {
            return ceil($value);
        } elseif ($fraction <= 0.01) {
            return floor($value);
        } else {
            return round(
                num: $value,
                precision: $precision,
                mode: PHP_ROUND_HALF_UP
            );
        }
    }
}
