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

namespace AppBundle\Entity;

use AppBundle\DBAL\Type\RoomStatus;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Fresh\DoctrineEnumBundle\Validator\Constraints as DoctrineAssert;

/**
 * BedRoom
 *
 * @ORM\Table(name="room_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RoomTypeRepository")
 */
class RoomType
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
     * @var string
     *
     * @ORM\Column(name="type", type="RoomType", nullable=false)
     * @DoctrineAssert\Enum(entity="AppBundle\DBAL\Type\RoomType")
     */
    protected $type;

    /**
     * @var float
     * @ORM\Column(name="price", type="float", nullable=false)
     */
    protected $price;

    /**
     * @ORM\Column(name="images", nullable=true)
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\RoomImage", mappedBy="roomType")
     */
    protected $images;

    /**
     * RoomType constructor.
     */
    public function __construct()
    {
        $this->image = new ArrayCollection();
    }


    /**
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return RoomType
     */
    public function setId(int $id): RoomType
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return RoomType
     */
    public function setType(string $type): RoomType
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return float
     */
    public function price()
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return RoomType
     */
    public function setPrice(float $price): RoomType
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return mixed
     */
    public function image()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     * @return RoomType
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    function __toString()
    {
        return $this->type();
    }


}