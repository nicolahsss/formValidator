<?php

declare(strict_types=1);

###############################################################################################################
###############################################################################################################
##                                                                                                           ##
##  ######################     #####            #####     #####            #####     ######################  ##
##  ######################     #####            #####     #####            #####     ######################  ##
##  ######################     ######           #####     #####            #####     ######################  ##
##  ######################     #######          #####     #####            #####     ######################  ##
##  ######################     ########         #####     #####            #####     ######################  ##
##  #####            #####     #########        #####     #####            #####     #####                   ##
##  #####            #####     ##########       #####     #####            #####     #####     .COM.BR       ##
##  #####            #####     ##### #####      #####     ######################     ######################  ##
##  #####            #####     #####  #####     #####     ######################     ######################  ##
##  ######################     #####   #####    #####     ######################     ######################  ##
##  ######################     #####    #####   #####     ######################     ######################  ##
##  ######################     #####     #####  #####     ######################     ######################  ##
##  ######################     #####      ##### #####     #####            #####                      #####  ##
##  ######################     #####       ##########     #####            #####                      #####  ##
##  #####                      #####        #########     #####            #####     ######################  ##
##  #####                      #####         ########     #####            #####     ######################  ##
##  #####                      #####          #######     #####            #####     ######################  ##
##  #####                      #####           ######     #####            #####     ######################  ##
##  #####                      #####            #####     #####            #####     ######################  ##
##                                                                                                           ##
###############################################################################################################
##                   TODOS OS DIREITOS RESERVADOS  O SENHOR E MEU PASTOR E NADA ME FALTARÁ                   ##
###############################################################################################################
###############################################################################################################
###############################################################################################################
##                                          INICIO CÓDIGO DE FONTE!                                          ##
###############################################################################################################

namespace Pnhs\FormValidator\validators;

use Pnhs\FormValidator\ValidatorInterface;

/**
 *
 * @author Nícola Serafim <nicola@seraf.im>
 */
class validatorGtin implements ValidatorInterface
{
    private $value;
    private $option;
    private $error = null;
    private $code = null;

    public function setValue(null|string|int $value): void
    {
        $this->value = (string) $value;
    }

    public function setOption(string $option): void
    {
        $this->option = $option;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function execute()
    {
        if (in_array(strlen($this->value), [8, 12, 13, 14])) {
            $i = strlen($this->value) - 2;
            $c = 3;
            $sum = 0;

            while ($i >= 0) {
                $sum = $sum + ($this->value[$i] * $c);
                $c = ($c == 1 ? 3 : 1);
                $i--;
            }

            $result_sum_div_10 = floor($sum / 10);
            $result_mult_10 = ($result_sum_div_10 + 1) * 10;
            $result_check = $result_mult_10 - $sum;
            $value_check = $this->value[strlen($this->value) - 1];

            if ($value_check == $result_check)
                return $this->value;
            else {
                $this->error = "it's not a valid gtin";
                return false;
            }
        } elseif (strlen($this->value) == 0) {
        } else {
            $this->error = "must contain 8, 12, 13 or 14 digits";
            return false;
        }
    }

    public function error()
    {
        return $this->error;
    }

    public function code()
    {
        return $this->code;
    }
}
