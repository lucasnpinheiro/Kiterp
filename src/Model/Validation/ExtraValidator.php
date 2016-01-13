<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Validation;

use Cake\Validation\Validator;

/**
 * Description of MyValidation
 *
 * @author lucas
 */
class ExtraValidator extends Validator {

    //put your code here

    public function __construct() {
        parent::__construct();
    }

    /**
     * Checks that a value is a monetary amount.
     *
     * @param string $check Value to check
     * @param string $symbolPosition Where symbol is located (left/right)
     * @return bool Success
     */
    public static function moeda($check) {
        $regex = '/^\d{1,3}(\.\d{3})*\,\d{2}$/u';
        return is_string($regex) && is_scalar($check) && preg_match($regex, $check);
    }

    public static function cnpj($cnpj) {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;

        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
            return false;

        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }

    public static function cpf($cpf) {
        $cpf = preg_replace('/[^0-9]/', '', (string) $cpf);

        // Valida tamanho
        if (strlen($cpf) != 11)
            return false;

        // Calcula e confere primeiro dígito verificador
        for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--)
            $soma += $cpf{$i} * $j;

        $resto = $soma % 11;

        if ($cpf{9} != ($resto < 2 ? 0 : 11 - $resto))
            return false;

        // Calcula e confere segundo dígito verificador
        for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--)
            $soma += $cpf{$i} * $j;

        $resto = $soma % 11;

        return $cpf{10} == ($resto < 2 ? 0 : 11 - $resto);
    }

}
