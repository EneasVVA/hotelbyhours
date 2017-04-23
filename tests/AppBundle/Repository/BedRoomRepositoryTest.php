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

namespace tests\AppBundle\Repository;

use AppBundle\Repository\BedRoomRepository;
use DateTime;
use PUGX\MultiUserBundle\Tests\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;


/**
 * @author Eneas Macías <emacias@ces.vocento.com>
 */
class BedRoomRepositoryTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        self::bootKernel();

        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    /**
     * @test
     */
    public function testSearchLocation()
    {
        /** @var BedRoomRepository $repo */
        $repo = $this->em
            ->getRepository('AppBundle:BedRoom')
        ;
        $rooms = $repo->search(null, "Madrid", null, null);

        $this->assertInternalType('array', $rooms);
        $this->assertGreaterThan(0, count($rooms));
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();

        $this->em->close();
        $this->em = null; // avoid memory leaks
    }
}