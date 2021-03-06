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
use AppBundle\Entity\Hotel;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * @author Eneas Macías <emacias@ces.vocento.com>
 */
class LoadRoomsData extends LoadHotelData implements OrderedFixtureInterface, FixtureInterface
{

    /**
     * @var BedRoom[]
     */
    protected static $rooms = [];

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach(self::$hotels as $hotel) {
            $hotel = $manager->getRepository(Hotel::class)->find($hotel->getId());

            $room = new BedRoom();
            $room->setType(self::$roomTypes[RoomType::SINGULAR][0]);
            $room->setNumber(1);
            $room->setStatus(RoomStatus::VACANT);
            $room->setHotel($hotel);
            self::$rooms[] = $room;

            $manager->persist($room);

            $room = new BedRoom();
            $room->setType(self::$roomTypes[RoomType::SINGULAR][1]);
            $room->setNumber(2);
            $room->setStatus(RoomStatus::VACANT);
            $room->setHotel($hotel);
            self::$rooms[] = $room;

            $manager->persist($room);

            $room = new BedRoom();
            $room->setType(self::$roomTypes[RoomType::SINGULAR][2]);
            $room->setNumber(3);
            $room->setStatus(RoomStatus::VACANT);
            $room->setHotel($hotel);
            self::$rooms[] = $room;

            $manager->persist($room);

            $room = new BedRoom();
            $room->setType(self::$roomTypes[RoomType::SINGULAR][3]);
            $room->setNumber(4);
            $room->setStatus(RoomStatus::VACANT);
            $room->setHotel($hotel);

            self::$rooms[] = $room;

            $manager->persist($room);
            $room->setHotel($manager->find(Hotel::class, $hotel));

            $room = new BedRoom();
            $room->setType(self::$roomTypes[RoomType::DOUBLE][0]);
            $room->setNumber(5);
            $room->setStatus(RoomStatus::VACANT);
            $room->setHotel($hotel);
            self::$rooms[] = $room;

            $manager->persist($room);

            $room = new BedRoom();
            $room->setType(self::$roomTypes[RoomType::DOUBLE][1]);
            $room->setNumber(10);
            $room->setStatus(RoomStatus::VACANT);
            $room->setHotel($hotel);
            self::$rooms[] = $room;

            $manager->persist($room);

            $room = new BedRoom();
            $room->setType(self::$roomTypes[RoomType::DOUBLE][2]);
            $room->setNumber(11);
            $room->setStatus(RoomStatus::VACANT);
            $room->setHotel($hotel);
            self::$rooms[] = $room;

            $manager->persist($room);

            $room = new BedRoom();
            $room->setType(self::$roomTypes[RoomType::TRIPLE][0]);
            $room->setNumber(12);
            $room->setStatus(RoomStatus::VACANT);
            $room->setHotel($hotel);
            self::$rooms[] = $room;

            $manager->persist($room);

            $room = new BedRoom();
            $room->setType(self::$roomTypes[RoomType::TRIPLE][0]);
            $room->setNumber(13);
            $room->setStatus(RoomStatus::VACANT);
            $room->setHotel($hotel);
            self::$rooms[] = $room;

            $manager->persist($room);

            $room = new BedRoom();
            $room->setType(self::$roomTypes[RoomType::SUIT][0]);
            $room->setNumber(14);
            $room->setStatus(RoomStatus::VACANT);
            $room->setHotel($hotel);
            self::$rooms[] = $room;

            $manager->persist($room);

        }
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }
}