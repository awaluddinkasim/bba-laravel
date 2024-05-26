<?php

use Stichoza\GoogleTranslate\GoogleTranslate;

if (!function_exists('translate')) {
    function translate($text): array
    {
        $tr = new GoogleTranslate("ar");
        $tr->setSource("id");

        $result = $tr->getResponse($text);

        return [
            'arab' => $result[0][0][0],
            'latin' => $result[0][1][2]
        ];
    }
}
