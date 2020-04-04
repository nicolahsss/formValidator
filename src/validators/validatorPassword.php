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
class validatorPassword implements validatorInterface {
    private $value;
    private $option;
    private $error = null;
    private $code = null;
    
    public function setValue($value): void {
        $this->value = $value;
    }
    
    public function setOption(string $option): void {
        $this->option = $option;
    }
    
    public function execute() {
        if (($this->option == 1) && (!$this->letter())) {
            return $this->letter(true);
        } else
        if (($this->option == 2)) {
            if ((!$this->letter())&&(!$this->number())) {
                $this->error = "must contain uppercase characters and numbers";
                $this->code = 3010;
                return false;
            }
            
            if (!$this->letter())
                return $this->letter(true);
            
            if (!$this->number())
                return $this->number(true);
        }
        return $this->value;
    }
    
    private function letter($error = false) {
        if ($error) {
            $this->error = "must contain uppercase characters";
            $this->code = 3009;
            return false;
        }
        return (preg_match('/\p{Lu}/u', $this->value));
    }
    
    private function number($error = false) {
        if ($error) {
            $this->error = "must contain numbers";
            $this->code = 3011;
            return false;
        }
        $filter = filter_var($this->value, FILTER_SANITIZE_NUMBER_INT);
        return is_numeric($filter);
    }
    
    public function error() {
        return $this->error;
    }

    public function code() {
        return $this->code;
    }

}
