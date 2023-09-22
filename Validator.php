<?php

class Validator
{
    /**
     * 
     * @return boolean
     */
     public function string($value, $min = 1, $max = INF)
     {
        // trim - защита от новой заметки из одних пробелов 
        $value = trim($value);
        
        return ((strlen($value) >= $min) && (strlen($value) <= $max));
     }
}