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

namespace tests\AppBundle\Entity;

use AppBundle\Entity\BedRoom;
use AppBundle\Entity\Hotel;
use AppBundle\Entity\Location;
use PHPUnit\Framework\TestCase;


/**
 * @author Eneas Macías <emacias@ces.vocento.com>
 */
class HotelTest extends TestCase
{
    /** @var Hotel */
    private $hotel;

    public function setUp() {
        $this->hotel = new Hotel();
    }

    /**
     * @test
     */
    public function shouldReturnAHotelName() {
        $this->hotel->setName("my hotel");

        $this->assertEquals("my hotel", $this->hotel->getName());
    }

    /**
     * @test
     */
    public function shouldReturnALocation() {
        $this->hotel->setLocation($instance = new Location());

        $this->assertSame($instance, $this->hotel->getLocation());
    }

    /**
     * @test
     */
    public function shouldReturnSetOfRooms() {
        $this->hotel->setRooms($rooms = [new BedRoom, new BedRoom()]);

        $this->assertSame($rooms[0], $this->hotel->rooms()[0]);
        $this->assertSame($rooms[0], $this->hotel->rooms()[0]);
    }
}