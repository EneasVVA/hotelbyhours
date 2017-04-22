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
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Symfony\Component\HttpFoundation\File\File;


/**
 * @author Eneas Macías <emacias@ces.vocento.com>
 * @Entity
 */
class RoomImage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *
     * @var File
     * @ORM\Column(type="blob", nullable=false)
     */
    private $imageFile;

    /**
     * @ManyToOne(targetEntity="AppBundle\Entity\RoomType", inversedBy="images")
     * @JoinColumn(name="image_id", referencedColumnName="id")
     */
    private $roomType;

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return File
     */
    public function imageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param File $imageFile
     */
    public function setImageFile(File $imageFile)
    {
        $this->imageFile = $imageFile;
    }

    /**
     * @return mixed
     */
    public function roomType()
    {
        return $this->roomType;
    }

    /**
     * @param mixed $roomType
     */
    public function setRoomType($roomType)
    {
        $this->roomType = $roomType;
    }


}