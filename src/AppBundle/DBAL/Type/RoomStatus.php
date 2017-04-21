<?php
/*
 * This file is part of the Vocento Software.
 *
 * (c) Vocento S.A., <desarrollo.dts@vocento.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace AppBundle\DBAL\Type;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;


/**
 * @author Eneas Macías <emacias@ces.vocento.com>
 */
class RoomStatus extends  AbstractEnumType
{
    const OCCUPIED = 'OC';
    const VACANT = 'V';
    const VACANT_CLEAN = 'VC';
    const VACANT_CLEAN_INSPECTION = 'VCI';
    const VACANT_DIRTY = 'VD';
    const CHECK_OUT = 'CO';
    const SLEEP_OUT = 'SO';
    const DO_NOT_DISTURB = 'DD';
    const DOUBLE_LOCK = 'DL';
    const OUT_OF_ORDER = 'OOO';

    protected static $choices = [
        self::OCCUPIED => 'Occupied',
        self::VACANT => 'Vacant',
        self::VACANT_CLEAN => 'Vacant clean inspection',
        self::VACANT_DIRTY => 'Vacant dirty',
        self::CHECK_OUT => 'Check out',
        self::SLEEP_OUT => 'Sleep out',
        self::DO_NOT_DISTURB => 'Do not disturb',
        self::DOUBLE_LOCK => 'Double lock',
        self::OUT_OF_ORDER => 'Out of order'
    ];
}