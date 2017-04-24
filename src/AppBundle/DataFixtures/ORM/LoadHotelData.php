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

use AppBundle\Entity\Hotel;
use AppBundle\Entity\Location;
use AppBundle\Entity\RoomType;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


/**
 * @author Eneas Macías <emacias@ces.vocento.com>
 */
class LoadHotelData implements OrderedFixtureInterface, FixtureInterface
{

    /**
     * @var Hotel[]
     */
    protected static $hotels = [];

    /**
     * @var RoomType[]
     */
    protected static $roomTypes = [];

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $hotel = new Hotel();
        $hotel->setName("Hotel Aljardin");
        $location = new Location();
        $location->setCity("Villanueva de la Serena");
        $location->setStreet("Avd. Chile 16");
        $location->setZipcode("06700");
        $hotel->setLocation($location);

        $manager->persist($hotel);
        self::$hotels[] = $hotel;

        $hotel = new Hotel();
        $hotel->setName("Hotel Madrid");
        $location = new Location();
        $location->setCity("Madrid");
        $location->setStreet("Calle Alcala, 100");
        $location->setZipcode("28022");
        $hotel->setLocation($location);

        $manager->persist($hotel);
        self::$hotels[] = $hotel;


        $hotel = new Hotel();
        $hotel->setName("Hotel Barcelona");
        $location = new Location();
        $location->setCity("Barcelona");
        $location->setStreet("Calle San Jordi, 111");
        $location->setZipcode("33553");
        $hotel->setLocation($location);
        $manager->persist($hotel);
        self::$hotels[] = $hotel;

        $hotel = new Hotel();
        $hotel->setName("Hotel Venus");
        $location = new Location();
        $location->setCity("Valencia");
        $location->setStreet("Calle Joan Manuel Serrat, 22");
        $location->setZipcode("026485");
        $hotel->setLocation($location);
        $manager->persist($hotel);
        self::$hotels[] = $hotel;

        $hotel = new Hotel();
        $hotel->setName("Motel M40");
        $location = new Location();
        $location->setCity("Madrid");
        $location->setStreet("Calle Alcala, 100");
        $location->setZipcode("22002");
        $hotel->setLocation($location);

        $manager->persist($hotel);
        self::$hotels[] = $hotel;

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 0;
    }


}