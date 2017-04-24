<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BookingControllerTest extends WebTestCase
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
    public function testReservation()
    {
        $client = $this->em
            ->getRepository('AppBundle:User\Client')->find(1);
        $booking_pre = $this->em
            ->getRepository('AppBundle:Booking')->findBy(array('client'=>$client->getUsername()));


        $clientCrawler = static::createClient();

        $crawler = $clientCrawler->request('GET', '/login');
        $form = $crawler->selectButton('Log in')->form();

        $form['_username'] = $client->getUsername();
        $form['_password'] = '123456';
        $crawler = $clientCrawler->submit($form);

        $crawler = $clientCrawler->request('GET', '/bedroom/');
        $link = $crawler->filter('.Reservar')->each(function ($node) {
            return $node->text();
        });
        $link = $crawler->selectLink($link[0])->link();
        $crawler = $clientCrawler->click($link);

        $booking_pos = $this->em
            ->getRepository('AppBundle:Booking')->findBy(array('client'=>$client->getUsername()));

        $this->assertGreaterThan(sizeof($booking_pre), sizeof($booking_pos));
    }
}
