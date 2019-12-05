<?php

namespace App\Traits;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

trait MultiLanguage
{
    protected $localeData = [];

    public function getAttribute($key)
    {
        if (in_array($key, $this->multilingual)) {
            $this->checkLocales();

            return array_get($this->localeData, $key . '.' . LaravelLocalization::getCurrentLocale());
        }

        return parent::getAttribute($key);
    }

    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->multilingual)) {
            $value = $this->getLocaleString($value);
        }

        parent::setAttribute($key, $value);
    }

    public function translate($key, $locale = NULL)
    {
        $this->checkLocales();

        if ($locale === NULL) {
            $data = [];

            foreach (LaravelLocalization::getSupportedLanguagesKeys() as $l) {
                $data[$l] = array_get($this->localeData, "$key.$l");
            }

            return $data;
        } else {
            return array_get($this->localeData, "$key.$locale");
        }
    }

    protected function checkLocales()
    {
        if (!$this->localeData) {
            foreach ($this->multilingual as $key) {
                $this->localeData[$key] = $this->getLocaleStringAsArray($this->getAttributeValue($key));
            }
        }
    }

    public static function getLocaleString($array)
    {
        $result = '';
        foreach ((array) $array as $locale => $value) {
            $result .= "[:{$locale}]" . trim($value);
        }

        return $result . '[:]';
    }

    protected function getLocaleStringAsArray($text)
    {
        $blocks = $this->qtranxf_get_language_blocks($text);

        return $this->qtranxf_split_blocks($blocks);
    }

    protected function qtranxf_get_language_blocks($text)
    {
        $split_regex = "#(<!--:[a-z]{2}-->|<!--:-->|\[:[a-z]{2}\]|\[:\]|\{:[a-z]{2}\}|\{:\})#ism";

        return preg_split($split_regex, $text, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
    }

    protected function qtranxf_split_blocks($blocks)
    {
        $result = [];
        $current_language = FALSE;
        foreach ($blocks as $block) {
            if (preg_match("#^\[:([a-z]{2})\]$#ism", $block, $matches)) {
                $current_language = $matches[1];
                continue;
            }
            switch ($block) {
                case '[:]':
                    $current_language = FALSE;
                    break;
                default:
                    if ($current_language) {
                        if (!isset($result[$current_language])) {
                            $result[$current_language] = '';
                        }
                        $result[$current_language] .= $block;
                        $current_language = FALSE;
                    } else {
                        foreach (LaravelLocalization::getSupportedLanguagesKeys() as $language) {
                            if ($language === config('app.locale')) {
                                $result[$language] = $block;
                            } else {
                                $result[$language] = '';
                            }
                        }
                    }
                    break;
            }
        }

        return $result;
    }
}
