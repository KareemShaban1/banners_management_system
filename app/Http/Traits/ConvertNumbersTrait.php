<?php

namespace App\Http\Traits;

trait ConvertNumbersTrait
{
    public function numberToArabicWords($number)
    {
        $ones = [
            'صفر',
            'واحد',
            'اثنان',
            'ثلاثة',
            'أربعة',
            'خمسة',
            'ستة',
            'سبعة',
            'ثمانية',
            'تسعة'
        ];

        $tens = [
            '', // 0-9 don't need a separate word for tens
            'عشرة',
            'عشرون',
            'ثلاثون',
            'أربعون',
            'خمسون',
            'ستون',
            'سبعون',
            'ثمانون',
            'تسعون'
        ];

        $hundreds = [
            '', // 0-9 don't need a separate word for hundreds
            'مائة',
            'مئتان',
            'ثلاثمائة',
            'أربعمائة',
            'خمسمائة',
            'ستمائة',
            'سبعمائة',
            'ثمانمائة',
            'تسعمائة'
        ];

        $tensOfThousands = [
            '', // 0-9 don't need a separate word for thousands
            'ألف',
            'ألفان',
            'ثلاثة آلاف',
            'أربعة آلاف',
            'خمسة آلاف',
            'ستة آلاف',
            'سبعة آلاف',
            'ثمانية آلاف',
            'تسعة آلاف'
        ];

        $thousands = [
            '', // 0-9 don't need a separate word for thousands
            'ألف',
            'ألفان',
            'ثلاثة آلاف',
            'أربعة آلاف',
            'خمسة آلاف',
            'ستة آلاف',
            'سبعة آلاف',
            'ثمانية آلاف',
            'تسعة آلاف'
        ];

        $hundredsOfThousands = [
            '', // 0-9 don't need a separate word for hundreds of thousands
            'مائة ألف',
            'مئتان ألف',
            'ثلاثمائة ألف',
            'أربعمائة ألف',
            'خمسمائة ألف',
            'ستمائة ألف',
            'سبعمائة ألف',
            'ثمانمائة ألف',
            'تسعمائة ألف'
        ];

        $millions = [
            '', // 0-9 don't need a separate word for millions
            'مليون',
            'مليونان',
            'ثلاثة ملايين',
            'أربعة ملايين',
            'خمسة ملايين',
            'ستة ملايين',
            'سبعة ملايين',
            'ثمانية ملايين',
            'تسعة ملايين'
        ];

        $digits = str_split(strrev($number));
        $arabicWords = [];

        for ($i = 0; $i < count($digits); $i++) {
            $digit = (int) $digits[$i];
            $placeValue = $i;

            if ($digit === 0) {
                continue;
            }

            $word = '';

            if ($placeValue === 0) {
                $word = $ones[$digit];
            } elseif ($placeValue === 1) {
                if ($digit === 1 && isset($digits[$i + 1])) {
                    $word = $tens[1 + (int) $digits[$i + 1]];
                    $i++;
                } else {
                    $word = $tens[$digit];
                }
            } elseif ($placeValue === 2) {
                $word = $hundreds[$digit];
            } elseif ($placeValue === 3) {
                $word = $thousands[$digit];
            } elseif ($placeValue === 4) {
                $word = $tensOfThousands[$digit];
            } elseif ($placeValue === 5) {
                $word = $hundredsOfThousands[$digit];
            } elseif ($placeValue === 6) {
                $word = $millions[$digit];
            } else {
                // Handle additional place values if needed
                // You can add more arrays and logic here
            }

            $arabicWords[] = $word;
        }

        return implode(' و ', array_reverse($arabicWords));
    }
}