<?php

declare(strict_types=1);

namespace AntonArdyshev\OtusComposerPackage;

use Transliterator;

class TransliteratorProcessor
{
    public function getFriendlyUrlForRussianLanguage(string $text, ?string $options = ''): ?string
    {
        $text = mb_strtolower($text);

        if (!$options) {
            $options = 'ё > yo; ц > c; х > h; е > e;';
        }

        $rules =  $options . '::Russian-Latin/BGN; ::NFD; ::Latin-ASCII; ::NFC;';
        $transliterator = Transliterator::createFromRules($rules);
        if (!$transliterator) {
            $rules = $options . '::Any-Latin; ::NFD; ::Latin-ASCII; ::NFC;';
            $transliterator = Transliterator::createFromRules($rules);
        }

        if (!$transliterator) {
            return null;
        }

        $textTransliterated = $transliterator->transliterate($text);
        if (!$textTransliterated) {
            return null;
        }

        $separator = '-';
        $textTransliterated = preg_replace('/[^-A-Za-z0-9_\s]+/u', '', $textTransliterated);
        $textTransliterated = preg_replace('/[\s_]+/u', $separator, $textTransliterated);

        $pattern = sprintf("/%s+/i", $separator);
        $textTransliterated = preg_replace($pattern , $separator, $textTransliterated);

        return trim($textTransliterated, $separator);
    }
}
