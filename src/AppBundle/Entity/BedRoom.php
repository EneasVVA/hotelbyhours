<?php

namespace AppBundle\Entity;

use AppBundle\DBAL\Type\RoomStatus;
use AppBundle\DBAL\Type\RoomType;
use Doctrine\ORM\Mapping as ORM;
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
     * @return RoomStatus
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
     * @return RoomType
     */
    public function getType()
    {
        return $this->type;
    }


}

