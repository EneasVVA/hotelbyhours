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

namespace AppBundle\Entity\User;

use Doctrine\ORM\Mapping as ORM;

use Fresh\DoctrineEnumBundle\Validator\Constraints as DoctrineAssert;
use PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="administrator")
 * @UniqueEntity(fields = "username", targetClass = "Acme\UserBundle\Entity\User\User", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "Acme\UserBundle\Entity\User\User", message="fos_user.email.already_used")
 */
class Administrator extends User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    function __toString()
    {
        return parent::getUsername();
    }
}