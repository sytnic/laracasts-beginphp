<?php

class Validator
{
    /**
     * 
     * @return boolean
     */
     public function string($value)
     {
        // trim - защита от новой заметки из одних пробелов 
        return strlen(trim($value)) == 0;
     }
}