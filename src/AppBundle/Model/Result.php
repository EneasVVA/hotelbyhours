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

namespace AppBundle\Model;

use AppBundle\Entity\BedRoom;


/**
 * @author Eneas Macías <emacias@ces.vocento.com>
 */
class Result
{
    /**
     * @var \DateTime
     */
    private $datetime;

    /**
     * @var BedRoom[]
     */
    private $bedrooms;

    /**
     * @return \DateTime
     */
    public function datetime()
    {
        return $this->datetime;
    }

    /**
     * @param \DateTime $datetime
     * @return Result
     */
    public function setDatetime(\DateTime $datetime): Result
    {
        $this->datetime = $datetime;
        return $this;
    }

    /**
     * @return BedRoom[]
     */
    public function bedrooms()
    {
        return $this->bedrooms;
    }

    /**
     * @param BedRoom[] $bedrooms
     * @return Result
     */
    public function setBedrooms(array $bedrooms): Result
    {
        $this->bedrooms = $bedrooms;
        return $this;
    }

    /**
     * @param BedRoom $bedRoom
     * @return BedRoom[]|array
     */
    public function addBedroom(BedRoom $bedRoom)
    {
        $this->bedrooms[] = $bedRoom;

        return $this->bedrooms;
    }



}