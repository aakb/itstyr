<?php

/*
 * This file is part of aakb/itstyr.
 *
 * (c) 2018–2019 ITK Development
 *
 * This source file is subject to the MIT license.
 */

namespace App\DBAL\Types;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

final class SmileyType extends AbstractEnumType
{
    public const GREEN = 'GREEN';
    public const RED = 'RED';
    public const BLUE = 'BLUE';
    public const YELLOW = 'YELLOW';

    protected static $choices = [
        self::GREEN => 'Green',
        self::YELLOW => 'Yellow',
        self::RED => 'Red',
        self::BLUE => 'Blue',
    ];
}
