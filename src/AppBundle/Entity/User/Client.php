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
 * @ORM\Table(name="client")
 * @UniqueEntity(fields = "username", targetClass = "Acme\UserBundle\Entity\User\User", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "Acme\UserBundle\Entity\User\User", message="fos_user.email.already_used")
 */
class Client extends User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $surname;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $dni;

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Client
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Client
     */
    public function setName(string $name): Client
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function surname()
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     * @return Client
     */
    public function setSurname(string $surname): Client
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * @return string
     */
    public function dni()
    {
        return $this->dni;
    }

    /**
     * @param string $dni
     * @return Client
     */
    public function setDni(string $dni): Client
    {
        $this->dni = $dni;
        return $this;
    }


}