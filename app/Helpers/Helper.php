<?php
namespace App\Helpers;
class Helper{
    static function parseTex($text) {
        $text = str_replace("_", "\_", $text);
        $text = str_replace("&","\&",$text);
        $pattern = "/([\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{FB50}-\x{FDFF}\x{FE70}-\x{FEFF}]+)/u";
        // Replacement pattern to wrap Urdu text with \\texturdu{}
        $replacement = '\\texturdu{$1}';
        // Applying the replacement
        return preg_replace($pattern, $replacement, $text);
    }
}