<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Booking;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;


class BookingController extends Controller
{

    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $bookBedroom = $em->getRepository('AppBundle:Booking')->findBy(array("client"=>1));

        return $this->render('booking/index.html.twig', array(
            'bookingList' => $bookBedroom,
        ));
    }

    /**
     * Creates a new booking entity.
     *
     */
    public function newAction(Request $request)
    {
        //TODO: Comprobar si el cliente que hace la reserva está logueado, sino lo esta ¿redirigir a login?
        $em = $this->getDoctrine()->getManager();
        $bedroom = $em->getRepository('AppBundle:BedRoom')->find($request->query->get('bedroom'));
        $client = $em->getRepository('AppBundle:User\Client')->find(1);

        if(!is_null($bedroom) && !is_null($client)){
            $start_date_dt = \DateTime::createFromFormat('d/m/Y H:i:s', $request->query->get('start_date'));
            $end_date_dt =  \DateTime::createFromFormat('d/m/Y H:i:s',  $request->query->get('end_date'));
            $reservartionCode = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
            $booking = new Booking();
            $booking->setStartDate($start_date_dt);
            $booking->setEndDate($end_date_dt);
            $booking->setBedroom($bedroom);
            $booking->setClient($client);
            $booking->setPrice(222);
           /* $booking->setClientName($client->getUsername());
            $booking->setClientSurname("Client-Surname");*/
            $booking->setCreatedat(new \DateTime('now'));
            $booking->setBookingCode($reservartionCode);

            $em->persist($booking);
            $em->flush();

            $message = \Swift_Message::newInstance()
                ->setSubject('Hello Email')
                ->setFrom('send@example.com')
                ->setTo('jotaememoreno@gmail.com')
                ->setBody(
                    $this->renderView(
                        'booking/email/booking.html.twig',
                        array(
                            'name' => $client->getUsername(),
                            'reservationCode' => $reservartionCode,
                            'startDate'=>$start_date_dt->format('Y-m-d H:i'),
                            'endDate'=>$end_date_dt->format('Y-m-d H:i')
                        )
                    ),
                    'text/html'
                );
            $this->get('mailer')->send($message);

            return new RedirectResponse($this->generateUrl('booking_index'));
        }else{
            echo "OK";
            die;
        }


    }

}
