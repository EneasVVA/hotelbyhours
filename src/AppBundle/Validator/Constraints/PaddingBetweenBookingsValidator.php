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

namespace AppBundle\Validator\Contraints;

use AppBundle\Entity\Booking;
use Doctrine\DBAL\Schema\Constraint;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\ConstraintValidator;


/**
 * @author Eneas Macías <emacias@ces.vocento.com>
 */
class PaddingBetweenBookingsValidator extends ConstraintValidator
{

    /** @var EntityManager */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Checks if the passed value is valid.
     *
     * @param Booking $value The value that should be validated
     * @param \Symfony\Component\Validator\Constraint $constraint The constraint for the validation
     */
    public function validate($value, \Symfony\Component\Validator\Constraint $constraint)
    {
        $result = $this->em->getRepository(Booking::class)->createQueryBuilder()
            ->select(array('u'))
            ->from('AppBundle:Booking', 'u')
            ->where('u.endDate BETWEEN :from AND :to')
            ->setParameter('to', $value->getStartDate()->add(\DateInterval::createFromDateString('- 2 hours')))
            ->setParameter('from', $value->getStartDate())
            ->getQuery()->getResult();

        return count($result) == 0;
    }

}