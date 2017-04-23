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
use AppBundle\Entity\RoomType;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\DBAL\Type\RoomType as EnumRoomType;


/**
 * @author Eneas Macías <emacias@ces.vocento.com>
 */
class LoadRoomType extends LoadHotelData implements FixtureInterface, OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        self::$roomTypes[EnumRoomType::SINGULAR] = $this->generateRooms(EnumRoomType::SINGULAR);
        self::$roomTypes[EnumRoomType::DOUBLE] = $this->generateRooms(EnumRoomType::DOUBLE);
        self::$roomTypes[EnumRoomType::TRIPLE] = $this->generateRooms(EnumRoomType::TRIPLE);
        self::$roomTypes[EnumRoomType::SUIT] = $this->generateRooms(EnumRoomType::SUIT);
    }

    public function generateRooms(string $type)
    {
        $rooms = [];
        for($i = 0; $i < 100; $i++) {
            $room = new RoomType();
            switch($type) {
                case EnumRoomType::SINGULAR:
                    $room->setPrice(rand(3000,4000)/100);
                    break;
                case EnumRoomType::DOUBLE:
                    $room->setPrice(rand(4000,5000)/100);
                    break;
                case EnumRoomType::TRIPLE:
                    $room->setPrice(rand(5000,6000)/100);
                    break;
                case EnumRoomType::SUIT:
                    $room->setPrice(rand(8000,10000)/100);
                    break;
            }

            $room->setType($type);
            $rooms[] = $room;
        }

        return $rooms;
    }



    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}