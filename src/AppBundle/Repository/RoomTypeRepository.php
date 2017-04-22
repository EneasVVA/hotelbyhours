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

namespace AppBundle\Repository;


use AppBundle\DBAL\Type\RoomStatus;
use AppBundle\DBAL\Type\RoomType;
use Doctrine\ORM\Mapping as ORM;
use Fresh\DoctrineEnumBundle\Validator\Constraints as DoctrineAssert;

/**
 * BedRoom
 *
 * @ORM\Table(name="room_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RoomTypeRepository")
 */
class RoomTypeRepository
{


}