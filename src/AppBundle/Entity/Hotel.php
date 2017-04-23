<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * Hotel
 *
 * @ORM\Table(name="hotel")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HotelRepository")
 */
class Hotel
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var Location
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Location", cascade={"persist"})
     */
    private $location;

    /**
     * @var BedRoom
     *
     * @OneToMany(targetEntity="AppBundle\Entity\BedRoom", mappedBy="hotel")
     */
    private $rooms;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Hotel
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set location
     *
     * @param Location $location
     *
     * @return Hotel
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return mixed
     */
    public function rooms()
    {
        return $this->rooms;
    }

    /**
     * @param mixed $rooms
     * @return Hotel
     */
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;
        return $this;
    }

    function __toString()
    {
        return $this->getName();
    }


}

