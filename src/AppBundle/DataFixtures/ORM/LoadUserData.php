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
use AppBundle\Entity\User\Administrator;
use AppBundle\Entity\User\Client;
use AppBundle\Entity\User\Responsible;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PUGX\MultiUserBundle\Doctrine\UserManager;
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
        $this->generateClients($manager);
        $this->createAdmin();
        $this->createResponsible();
    }


    public function generateClients(ObjectManager $manager)
    {
        $discriminator = $this->container->get('pugx_user.manager.user_discriminator');
        $discriminator->setClass(Client::class);

        $userManager = $this->container->get('pugx_user_manager');

        for($i=0; $i < 15; $i++)
        {
            /** @var Client $client */
            $client = $userManager->createUser();

            $client->setUsername("client$i");
            $client->setEmail("client$i@test.com");
            $client->setPlainPassword('123456');
            $client->setEnabled(true);
            $client->setName("Client$i");
            $client->setSurname("Client$i Surname");
            $client->setDni("08365645N");

            $userManager->updateUser($client, false);
            
        }
        $manager->flush();

    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    private function createAdmin()
    {
        $discriminator = $this->container->get('pugx_user.manager.user_discriminator');
        $discriminator->setClass(Administrator::class);

        $userManager = $this->container->get('pugx_user_manager');

        /** @var Administrator */
        $admin = $userManager->createUser();

        $admin->setUsername('admin1');
        $admin->setEmail('admin@test.com');
        $admin->setPlainPassword('123456');
        $admin->setEnabled(true);
        $admin->setRoles(['ROLE_ADMIN']);

        $userManager->updateUser($admin, true);
    }

    private function createResponsible()
    {
        $discriminator = $this->container->get('pugx_user.manager.user_discriminator');
        $discriminator->setClass(Responsible::class);

        $userManager = $this->container->get('pugx_user_manager');

        /** @var Responsible */
        $responsible = $userManager->createUser();

        $responsible->setUsername('respon1');
        $responsible->setEmail('respon1@test.com');
        $responsible->setPlainPassword('123456');
        $responsible->setEnabled(true);
        $responsible->setRoles(['ROLE_RESPONSIBLE']);

        $userManager->updateUser($responsible, true);
    }
}