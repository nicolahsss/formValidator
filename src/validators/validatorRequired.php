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
##                                          INICIO CODIGO DE FONTE!                                          ##
###############################################################################################################

namespace Serafim\FormValidator\validators;

use Serafim\FormValidator\ValidatorInterface;

/**
 * Description of modelMin
 *
 * @author nicolahsss
 */
class validatorRequired implements ValidatorInterface
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
        if ((!isset($this->value)) && (gettype($this->value) !== "boolean")) {
            $this->error = "is required";
            return false;
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
