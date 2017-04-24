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
use AppBundle\Entity\User\Client;

use PHPUnit\Framework\TestCase;

/**
 * @author Eneas Macías <emacias@ces.vocento.com>
 */
class ClientTest extends TestCase
{
    /**
     * @var Client
     */
    private $client;

    public function setUp()
    {
        $this->client = new Client();
    }


    /**
     * @test
     */
    public function shouldReturnName()
    {
        $this->client->setName("name");

        $this->assertEquals("name", $this->client->name());
    }

    /**
     * @test
     */
    public function shouldReturnSurname()
    {
        $this->client->setSurname("username");

        $this->assertEquals("username", $this->client->surname());
    }

    /**
     * @test
     */
    public function shouldReturnDni()
    {
        $this->client->setDni("08365342");

        $this->assertEquals("08365342", $this->client->dni());
    }
}