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

namespace AppBundle\DataFixtures\ORM;

use AppBundle\DBAL\Type\RoomStatus;
use AppBundle\DBAL\Type\RoomType;
use AppBundle\Entity\BedRoom;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * @author Eneas Macías <emacias@ces.vocento.com>
 */
class LoadRoomsData implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $room = new BedRoom();
        $room->setType(RoomType::SINGULAR);
        $room->setNumber(1);
        $room->setStatus(RoomStatus::VACANT);
        $manager->persist($room);

        $room = new BedRoom();
        $room->setType(RoomType::SINGULAR);
        $room->setNumber(2);
        $room->setStatus(RoomStatus::VACANT);
        $manager->persist($room);

        $room = new BedRoom();
        $room->setType(RoomType::SINGULAR);
        $room->setNumber(3);
        $room->setStatus(RoomStatus::VACANT);
        $manager->persist($room);

        $room = new BedRoom();
        $room->setType(RoomType::SINGULAR);
        $room->setNumber(4);
        $room->setStatus(RoomStatus::VACANT);
        $manager->persist($room);

        $room = new BedRoom();
        $room->setType(RoomType::DOUBLE);
        $room->setNumber(5);
        $room->setStatus(RoomStatus::VACANT);
        $manager->persist($room);

        $room = new BedRoom();
        $room->setType(RoomType::DOUBLE);
        $room->setNumber(10);
        $room->setStatus(RoomStatus::VACANT);
        $manager->persist($room);

        $room = new BedRoom();
        $room->setType(RoomType::DOUBLE);
        $room->setNumber(11);
        $room->setStatus(RoomStatus::VACANT);
        $manager->persist($room);

        $room = new BedRoom();
        $room->setType(RoomType::DOUBLE);
        $room->setNumber(12);
        $room->setStatus(RoomStatus::VACANT);
        $manager->persist($room);

        $room = new BedRoom();
        $room->setType(RoomType::DOUBLE);
        $room->setNumber(13);
        $room->setStatus(RoomStatus::VACANT);
        $manager->persist($room);

        $room = new BedRoom();
        $room->setType(RoomType::SUIT);
        $room->setNumber(14);
        $room->setStatus(RoomStatus::VACANT);
        $manager->persist($room);
        $manager->flush();
    }

}