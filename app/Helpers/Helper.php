<?php
namespace App\Helpers;
class Helper{
    static function parseTex($text) {
        $text = str_replace("_", "\_", $text);
        $patternForAnd = '/(\b\w{2,}+)\s*&\s*(\w{2,}+\b)/';
        $replacementAnd = '$1\\&$2';
        $text = preg_replace($patternForAnd, $replacementAnd, $text);
        return $text;
        // $text = str_replace("&","\&",$text);
        $pattern = "/([\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{FB50}-\x{FDFF}\x{FE70}-\x{FEFF}]+)/u";
        if (preg_match($pattern, $text)) {
            return "\\begin{RTL}".$text."\\end{RTL}";
        }
        return $text;
        // Replacement pattern to wrap Urdu text with \\texturdu{}
        $replacement = '\\texturdu{$1}';
        // Applying the replacement
        return preg_replace($pattern, $replacement, $text);
    }

    static function hasUrdu($text) {
        $pattern = "/([\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{FB50}-\x{FDFF}\x{FE70}-\x{FEFF}]+)/u";
        return preg_match($pattern, $text);
    }
}