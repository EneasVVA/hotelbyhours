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
use AppBundle\Entity\User\Client;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


/**
 * @author Eneas Macías <emacias@ces.vocento.com>
 */
class LoadUserData implements FixtureInterface, ContainerAwareInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $discriminator = $this->container->get('pugx_user.manager.user_discriminator');
        $discriminator->setClass(Client::class);

        $userManager = $this->container->get('pugx_user_manager');

        /** @var Client $client */
        $client = $userManager->createUser();

        $client->setUsername('client1');
        $client->setEmail('client1@test.com');
        $client->setPlainPassword('123456');
        $client->setEnabled(true);
        $client->setName("Client1");
        $client->setSurname("Client1Surname");
        $client->setDni("08365645N");

        $userManager->updateUser($client, true);
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}