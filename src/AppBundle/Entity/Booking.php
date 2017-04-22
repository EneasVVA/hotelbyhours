<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Booking
 *
 * @ORM\Table(name="booking", uniqueConstraints={@ORM\UniqueConstraint(name="booking_code_UNIQUE", columns={"booking_code"})}, indexes={@ORM\Index(name="fk_cliente_idx", columns={"id_client"}), @ORM\Index(name="fk_bedroom_idx", columns={"id_bedroom"})})
 * @ORM\Entity
 */
class Booking
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="datetime", nullable=true)
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="datetime", nullable=true)
     */
    private $endDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=true)
     */
    private $createdat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=true)
     */
    private $updatedat;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=45, nullable=true)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="booking_code", type="string", length=6, nullable=true)
     */
    private $bookingCode;

    /**
     * @var string
     *
     * @ORM\Column(name="client_name", type="string", length=45, nullable=true)
     */
    private $clientName;

    /**
     * @var string
     *
     * @ORM\Column(name="client_surname", type="string", length=45, nullable=true)
     */
    private $clientSurname;

    /**
     * @var BedRoom
     *
     * @ORM\ManyToOne(targetEntity="BedRoom")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_bedroom", referencedColumnName="id")
     * })
     */
    private $idBedroom;

    /**
     * @var User\Client
     *
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\User\Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_client", referencedColumnName="id")
     * })
     */
    private $idClient;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Booking
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Booking
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return Booking
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;

        return $this;
    }

    /**
     * Get createdat
     *
     * @return \DateTime
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * Set updatedat
     *
     * @param \DateTime $updatedat
     *
     * @return Booking
     */
    public function setUpdatedat($updatedat)
    {
        $this->updatedat = $updatedat;

        return $this;
    }

    /**
     * Get updatedat
     *
     * @return \DateTime
     */
    public function getUpdatedat()
    {
        return $this->updatedat;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Booking
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set bookingCode
     *
     * @param string $bookingCode
     *
     * @return Booking
     */
    public function setBookingCode($bookingCode)
    {
        $this->bookingCode = $bookingCode;

        return $this;
    }

    /**
     * Get bookingCode
     *
     * @return string
     */
    public function getBookingCode()
    {
        return $this->bookingCode;
    }

    /**
     * Set clientName
     *
     * @param string $clientName
     *
     * @return Booking
     */
    public function setClientName($clientName)
    {
        $this->clientName = $clientName;

        return $this;
    }

    /**
     * Get clientName
     *
     * @return string
     */
    public function getClientName()
    {
        return $this->clientName;
    }

    /**
     * Set clientSurname
     *
     * @param string $clientSurname
     *
     * @return Booking
     */
    public function setClientSurname($clientSurname)
    {
        $this->clientSurname = $clientSurname;

        return $this;
    }

    /**
     * Get clientSurname
     *
     * @return string
     */
    public function getClientSurname()
    {
        return $this->clientSurname;
    }

    /**
     * Set idBedroom
     *
     * @param \AppBundle\Entity\BedRoom $idBedroom
     *
     * @return Booking
     */
    public function setIdBedroom(\AppBundle\Entity\BedRoom $idBedroom = null)
    {
        $this->idBedroom = $idBedroom;

        return $this;
    }

    /**
     * Get idBedroom
     *
     * @return \AppBundle\Entity\BedRoom
     */
    public function getIdBedroom()
    {
        return $this->idBedroom;
    }

    /**
     * Set idClient
     *
     * @param \AppBundle\Entity\User\Client $idClient
     *
     * @return Booking
     */
    public function setIdClient(\AppBundle\Entity\User\Client $idClient = null)
    {
        $this->idClient = $idClient;

        return $this;
    }

    /**
     * Get idClient
     *
     * @return \AppBundle\Entity\User\Client
     */
    public function getIdClient()
    {
        return $this->idClient;
    }
}
