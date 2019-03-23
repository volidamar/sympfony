<?php

namespace AppBundle\DBAL;

use Doctrine\Common\Util\Debug;
use Doctrine\DBAL\Platforms\MySqlPlatform;
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class EnumType extends Type
{
    protected $name;

    public static $VALUES = array();

    public static function getValues()
    {
        return array_combine(static::$VALUES, static::$VALUES);
    }

    public function getSqlDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {   
        self::$VALUES=$fieldDeclaration['enumValues'];
        $values = array_map(function($val) { return "'".$val."'"; }, static::$VALUES);
        
        return "ENUM(".implode(", ", $values).") COMMENT '(DC2Type:".$this->name.")'";
    }

//    public function getSqlDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
//    {   
//        $values = array_map(function($val) { return "'".$val."'"; }, $fieldDeclaration['enumValues']);
//        
//        return "ENUM(".implode(", ", $values).") COMMENT '(DC2Type:".$this->name.")'";
//    }
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return $value;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (!in_array($value, static::$VALUES)) {
            throw new \InvalidArgumentException("Invalid value '$value' for enum '$this->name'.");
        }
        return $value;
    }

    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Gets an array of database types that map to this Doctrine type.
     *
     * @param AbstractPlatform $platform
     *
     * @return array
     */
    public function getMappedDatabaseTypes(AbstractPlatform $platform)
    {
        if ($platform instanceof MySqlPlatform) {
            return \array_merge(parent::getMappedDatabaseTypes($platform), ['enum']);
        }
        return parent::getMappedDatabaseTypes($platform);
    }
}