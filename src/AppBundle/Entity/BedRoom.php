<?php

namespace AppBundle\Entity;

use AppBundle\DBAL\Type\RoomStatus;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\OneToOne;
use Fresh\DoctrineEnumBundle\Validator\Constraints as DoctrineAssert;

/**
 * BedRoom
 *
 * @ORM\Table(name="bed_room")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BedRoomRepository")
 */
class BedRoom
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer", unique=true)
     */
    protected $number;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="RoomStatus", nullable=false)
     * @DoctrineAssert\Enum(entity="AppBundle\DBAL\Type\RoomStatus")
     */
    protected $status;

    /**
     * @var RoomType
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\RoomType", cascade={"persist"})
     *
     */
    protected $type;

    /**
     * @var Hotel
     *
     * @ManyToOne(targetEntity="AppBundle\Entity\Hotel", inversedBy="rooms")
     */
    protected $hotel;

    /**
     * @var RoomServices
     *
     * @OneToOne(targetEntity="AppBundle\Entity\RoomServices", cascade={"persist"} )
     */
    protected $services;

    /**
     * @var ArrayCollection
     *
     * @OneToMany(targetEntity="AppBundle\Entity\Booking", mappedBy="bedroom")
     */
    protected $bookings;

    public function __constructs() {
        $this->bookings = new ArrayCollection();
    }

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
     * Set number
     *
     * @param integer $number
     *
     * @return BedRoom
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param RoomStatus $status
     * @return BedRoom
     */
    public function setStatus($status): BedRoom
    {
        $this->status = $status;

        return $this;
    }



    /**
     * Set type
     *
     * @param string $type
     *
     * @return BedRoom
     */
    public function setType(RoomType $type) : BedRoom
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return RoomType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function hotel()
    {
        return $this->hotel;
    }

    /**
     * @param mixed $hotel
     * @return BedRoom
     */
    public function setHotel($hotel)
    {
        $this->hotel = $hotel;
        return $this;
    }

    /**
     * @return RoomServices
     */
    public function services()
    {
        return $this->services;
    }

    /**
     * @param RoomServices $services
     */
    public function setServices(RoomServices $services)
    {
        $this->services = $services;
    }

    /**
     * @return ArrayCollection
     */
    public function bookings()
    {
        return $this->bookings;
    }

    /**
     * @param ArrayCollection $bookings
     */
    public function setBookings($bookings)
    {
        $this->bookings = $bookings;
    }




}

