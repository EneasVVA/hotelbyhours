<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User\Responsible;
use AppBundle\Entity\Booking;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Responsible controller.
 *
 */
class ResponsibleController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bookings = $em->getRepository('AppBundle\Entity\Booking')->findAll();

        return $this->render('responsible/index.html.twig', array('bookings' => $bookings));
    }
}
