<?php

namespace AppBundle\Entity;

use AppBundle\DBAL\Type\RoomStatus;
use AppBundle\DBAL\Type\RoomType;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
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
     * @var string
     *
     * @ORM\Column(name="type", type="RoomType", nullable=false)
     * @DoctrineAssert\Enum(entity="AppBundle\DBAL\Type\RoomType")
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
     * @param RoomType $type
     *
     * @return BedRoom
     */
    public function setType($type) : BedRoom
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
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




}

