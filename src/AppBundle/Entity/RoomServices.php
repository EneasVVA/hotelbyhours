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
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Eneas Macías <emacias@ces.vocento.com>
 * @ORM\Entity
 * @ORM\Table(name="room_services")
 */
class RoomServices
{


    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $jacuzzi;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $minibar;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $internet;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $television;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $aircondition;

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return RoomServices
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return bool
     */
    public function jacuzzi()
    {
        return $this->jacuzzi;
    }

    /**
     * @param bool $jacuzzi
     * @return RoomServices
     */
    public function setJacuzzi(bool $jacuzzi): RoomServices
    {
        $this->jacuzzi = $jacuzzi;
        return $this;
    }

    /**
     * @return bool
     */
    public function minibar()
    {
        return $this->minibar;
    }

    /**
     * @param bool $minibar
     * @return RoomServices
     */
    public function setMinibar(bool $minibar): RoomServices
    {
        $this->minibar = $minibar;
        return $this;
    }

    /**
     * @return bool
     */
    public function internet()
    {
        return $this->internet;
    }

    /**
     * @param bool $internet
     * @return RoomServices
     */
    public function setInternet(bool $internet): RoomServices
    {
        $this->internet = $internet;
        return $this;
    }

    /**
     * @return bool
     */
    public function television()
    {
        return $this->television;
    }

    /**
     * @param bool $television
     * @return RoomServices
     */
    public function setTelevision(bool $television): RoomServices
    {
        $this->television = $television;
        return $this;
    }

    /**
     * @return bool
     */
    public function aircondition()
    {
        return $this->aircondition;
    }

    /**
     * @param bool $aircondition
     * @return RoomServices
     */
    public function setAircondition(bool $aircondition): RoomServices
    {
        $this->aircondition = $aircondition;
        return $this;
    }

    function __toString()
    {
        return sprintf("Jacuzzi: %d, Minibar: %d, Internet: %d, Television: %d, Aircondition: %d",
                        $this->jacuzzi, $this->minibar, $this->internet, $this->television, $this->aircondition);
    }


}