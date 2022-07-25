<?php

namespace App\Modules\Coupons\Utils;

use App\Modules\Coupons\Providers\CouponsServiceProvider;

class CouponsUtils
{
    /**
     * Translate the given message.
     *
     * @param  string|null  $key
     * @param  array  $replace
     * @param  string|null  $locale
     * @return \Illuminate\Contracts\Translation\Translator|string|array|null
     */
    public static function trans($key = null, $replace = [], $locale = null)
    {
        static $baseTranslationName;

        if (! $baseTranslationName) {
            $baseTranslationName = CouponsServiceProvider::TRANSLATION_PREFIX;
        }

        return trans($baseTranslationName . '::' . $key, $replace, $locale);
    }
}