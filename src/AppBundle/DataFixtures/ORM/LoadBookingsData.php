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

use AppBundle\Entity\BedRoom;
use AppBundle\Entity\Booking;
use AppBundle\Entity\RoomType;
use DateInterval;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Translation\Interval;


/**
 * @author Eneas Macías <emacias@ces.vocento.com>
 */
class LoadBookingsData extends LoadRoomsData implements OrderedFixtureInterface, FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach(self::$rooms as $room) {
            for ($i = 0; $i < 200; $i++) {
                $booking = new Booking();
                $dt = new \DateTime();

                $booking->setStartDate($dt->add(DateInterval::createFromDateString(sprintf('%d hours', rand(0, 150)))));
                $booking->setEndDate($dt->add(DateInterval::createFromDateString(sprintf('%d hours', rand(2, 6)))));
                $bedroom = $manager->find(BedRoom::class, $room->getId());
                $booking->setBedroom($bedroom);
                $booking->setPrice($bedroom->getType()->price());

                $manager->persist($booking);

            }
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
        return 3;
    }

}