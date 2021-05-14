<?php

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
##                                          INICIO CODIGO DE FONTE!                                          ##
###############################################################################################################

namespace PNHS\Validator\validators;

use PNHS\Validator\ValidatorInterface;

/**
 * Description of modelMin
 *
 * @author nicolahsss
 */
class validatorUsername implements validatorInterface
{
    private $value;
    private $option;
    private $error = null;
    private $code = null;

    public function setValue($value): void
    {
        $this->value = $value;
    }

    public function setOption(string $option): void
    {
        $this->option = $option;
    }

    public function setCode(int $code): void
    {
        $this->code = $code;
    }

    public function execute()
    {
        if (((int) $this->option === 0) && !ctype_lower($this->value)) {
            $this->error = "must contain only lowercase letters";
            return false;
        } else {
            for ($i = 0; $i < strlen($this->value); $i++) {
                if ((int) $this->option === 1) {
                    if (!ctype_lower($this->value[$i]) && !ctype_digit($this->value[$i])) {
                        $this->error = "must contain only lowercase letters and numbers";
                        return false;
                    }
                }
                if ((int) $this->option === 2) {
                    if (!ctype_lower($this->value[$i]) && !ctype_digit($this->value[$i]) && $this->value[$i] !== "_") {
                        if (!ctype_lower($this->value[$i]) && !ctype_digit($this->value[$i])) {
                            $this->error = "must contain only lowercase letters, numbers and underline";
                            return false;
                        }
                    }
                }
                if ((int) $this->option === 3) {
                    if (!ctype_alnum($this->value[$i]) && $this->value[$i] !== "_") {
                        $this->error = "must contain only letters, numbers and underline";
                        return false;
                    }
                }
            }
        }
        return $this->value;
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
