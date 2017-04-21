<?php

namespace AppBundle\DBAL\Type;

use Doctrine\ORM\Mapping as ORM;
use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

/**
 * RoomType
 */
final class RoomType extends AbstractEnumType
{
    const SINGULAR = 'SINGULAR';
    const DOUBLE = 'DOUBLE';
    const SUIT = 'SUIT';

    protected static $choices = [
        self::SINGULAR => 'Singular',
        self::DOUBLE => 'Double',
        self::SUIT => 'Suit',
    ];
}

