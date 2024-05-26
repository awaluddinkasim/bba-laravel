<?php

use Illuminate\Support\Str;
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

if (!function_exists('embedYoutube')) {
    function embedYoutube($url): string
    {
        if (Str::contains($url, 'embed')) return "https://$url";

        if (Str::contains($url, 'https://')) {
            $url = explode('/', $url);

            $result = "https://$url[2]/embed/" . substr($url[3], strpos($url[3], "=") + 1);
        } else {
            $url = explode('/', $url);

            $result = "https://$url[0]/embed/" . substr($url[1], strpos($url[1], "=") + 1);
        }

        return $result;
    }
}
