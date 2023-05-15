<?php

namespace App\Service;

class Service
{
    public static function validateCPF($cpf)
    {      
        // Retira a máscara do cpf 
        $cpf_limpo = str_replace(array(".", "-"), '', $cpf);

        if (strlen($cpf_limpo) !== 11)
            echo 'Digite um cpf com tamanho válido';

        $arr_numeros = str_split($cpf_limpo);

        for ($i = 0; $i < count($arr_numeros); $i++)
            $nums[] = intval($arr_numeros[$i]);

        $primeiro_verificador = $nums[9];
        $segundo_verificador = $nums[10];

        // Primeira verificação

        $j = 10;
        $res = 0;
        for ($i = 0; $i < 9; $i++) {
            $res += $nums[$i] * $j;
            $j--;
        }

        $divisao_1 = ($res * 10) % 11;
        if ($divisao_1 == 10)
            $divisao_1 = 0;

        // Segunda verificação

        $j = 11;
        $res = 0;
        for ($i = 0; $i < 10; $i++) {
            $res += $nums[$i] * $j;
            $j--;
        }

        $divisao_2 = ($res * 10) % 11;
        if ($divisao_2 == 10)
            $divisao_2 = 0;

        // Verificando se os dois estão válidos

        if ($divisao_1 == $primeiro_verificador && $divisao_2 == $segundo_verificador) {
            return true;
        } else
            return false;
    }

    public static function unmaskCPF($cpf){
        return str_replace(array(".", "-"), '', $cpf);
    }
}
