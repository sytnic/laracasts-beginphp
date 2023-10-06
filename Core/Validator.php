<?php

namespace Core;

class Validator
{
    /**
     * 
     * @return boolean
     */
     public static function string($value, $min = 1, $max = INF)
     {
        // trim - защита от новой заметки из одних пробелов 
        $value = trim($value);
        
        return ((strlen($value) >= $min) && (strlen($value) <= $max));
     }

     public static function email($value)
     {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
     }
}