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
    public static function moeda($check, $symbolPosition = 'left') {
        $regex = '/^\d{1,3}(\.\d{3})*\,\d{2}$/u';
        return is_string($regex) && is_scalar($check) && preg_match($regex, $check);
    }

}
