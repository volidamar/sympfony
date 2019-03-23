<?php

namespace AppBundle\DBAL;

use Doctrine\DBAL\Platforms\AbstractPlatform;

class GenderType extends EnumType
{
    protected $name = 'gender';
   // public static $VALUES = array('male', 'female');

    
}