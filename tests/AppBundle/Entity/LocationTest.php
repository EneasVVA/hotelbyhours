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

use AppBundle\Entity\Location;
use PHPUnit\Framework\TestCase;


/**
 * @author Eneas Macías <emacias@ces.vocento.com>
 */
class LocationTest extends TestCase
{

    /**
     * @var Location
     */
    private $location;
    
    public function setUp()
    {
        $this->location = new Location();
    }

    /**
     * @test
     */
    public function shouldReturnACity() {
        $this->location->setCity("villanueva");

        $this->assertEquals("villanueva", $this->location->getCity());
    }

    /**
     * @test
     */
    public function shouldReturnAZipcode() {
        $this->location->setZipcode("06700");

        $this->assertEquals("06700", $this->location->zipcode());
    }

    /**
     * @test
     */
    public function shouldReturnAStreet() {
        $this->location->setStreet("calle nueva");

        $this->assertEquals("calle nueva", $this->location->getStreet());
    }
    
}