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
class validatorPassword implements validatorInterface
{

    private $value;
    private $option;
    private $error = null;
    private $code = null;

    public function setValue($value): void
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
        $pattern = match ((int)$this->option) {
            //0-9,a-z ou A-Z
            1 => '/^(?=.*\d)(?=.*[a-zA-Z])[0-9a-zA-Z$*&@#]{8,100}$/',
            //0-9,a-z,A-Z
            2 => '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z$*&@#]{8,100}$/',
            //0-9,a-z,A-Z,special caracter
            3 => '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#])[0-9a-zA-Z$*&@#]{8,100}$/',
            //0-9,a-z,A-Z,special caracter,no repeat aa AA 11
            4 => '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#])(?:([0-9a-zA-Z$*&@#])(?!\1)){8,100}$/',
            //0-9,a-z,A-Z,special caracter,no repeat aa AA 11 aA
            5 => '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#])(?:([0-9a-zA-Z$*&@#])(?!\1)){8,100}$/i',
        };

        if ((!\is_null($this->value)) && (preg_match($pattern, $this->value) ? false : true)) {
            $this->error = match ((int)$this->option) {
                1 => 'must contain at least one letter and one number',
                2 => 'must contain at least one lowercase letter, one uppercase letter and a number',
                3 => 'must contain at least one lowercase letter, one uppercase letter, one number and one special character',
                4, 5 => 'must contain at least one lowercase letter, one uppercase letter, one number, one special character,and cannot contain two subsequent equal characters'
            };
            // $this->error = "must contain a maximum {$this->option} characters";
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
