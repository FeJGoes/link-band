<?php

namespace Services;

class Utils 
{
    public static function isValidPhone(string $str) 
    {
        return preg_match('/(?\d{2}\)?\s)?(\d{4,5}\-\d{4}/',$str);
    }

    public static function isValidZipcode(string $str) 
    {
        return preg_match('/^[0-9]{2}\.[0-9]{3}\-[0-9]{3}|[0-9]{2}\s[0-9]{3}\-[0-9]{3}|[0-9]{5}\-[0-9]{3}|[0-9]{8}$/',$str);
    }

    public static function isValidBrazilianState(string $str) 
    {
        $estados = array (
            "AC", "AL", "AM", "AP", "BA", "CE", "DF", "ES", "GO", "MA", "MT", "MS", "MG", "PA", "PB", "PR", "PE", "PI", "RJ", "RN", "RO", "RS", "RR", "SC", "SE", "SP", "TO"
            );
            
        $result = strlen($str) == 2 ? 
                        array_search($str, $estados) :
                        FALSE;
    
        return $result ? $str : FALSE;
    }

    public static function removeSpecialChar(string $str) 
    {
        $caracteres_especiais = array (
            '!','"','#','$','%','&','','(',')','*','+','-','.','/',':',';',',','<','=','>','?','@','[','\\',']','^','_','`','{','|','}','~',"'",' '
            );

        $result = str_replace($caracteres_especiais,'',$str);
    
        return $result;
    }
}