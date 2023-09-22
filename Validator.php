<?php

class Validator
{
    /**
     * 
     * @return boolean
     */
     public function string($value)
     {
        return strlen($value) == 0;
     }
}