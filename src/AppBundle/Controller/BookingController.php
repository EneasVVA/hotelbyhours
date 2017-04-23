<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Booking;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;


class BookingController extends Controller
{

    /**
     * Creates a new booking entity.
     *
     */
    public function newAction(Request $request)
    {
        $auth_checker = $this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY');

        if ($auth_checker) {
            $user = $this->get('security.token_storage')->getToken()->getUser();

            $em = $this->getDoctrine()->getManager();
            $bedroom = $em->getRepository('AppBundle:BedRoom')->find($request->query->get('bedroom'));
            $client = $em->getRepository('AppBundle:User\Client')->find(1);

            if(!is_null($bedroom) && !is_null($client)){
                $start_date_dt = \DateTime::createFromFormat('d/m/Y H:i:s', $request->query->get('start_date'));
                $end_date_dt =  \DateTime::createFromFormat('d/m/Y H:i:s',  $request->query->get('end_date'));
                $end_date_dt->modify('+2 hours');

                $reservartionCode = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);

                $diff = $start_date_dt->diff($end_date_dt);

                $hours = $diff->h;
                $totalReservationTimeHours = $hours + ($diff->days*24);
                $price = $totalReservationTimeHours*$bedroom->getType()->Price();
                $booking = new Booking();
                $booking->setStartDate($start_date_dt);
                $booking->setEndDate($end_date_dt);
                $booking->setBedroom($bedroom);
                $booking->setPrice($price);
                $booking->setClient($user);
                $booking->setCreatedat(new \DateTime('now'));
                $booking->setBookingCode($reservartionCode);

                $em->persist($booking);
                $em->flush();
                $this->sendMail($user,$reservartionCode,$start_date_dt,$end_date_dt->modify('-2 hours'),$price);

                return new RedirectResponse($this->generateUrl('bedroom_index'));
            }
        }
        else{
            return $this->redirect('/login');

        }

    }

    public function sendMail($client,$reservartionCode,$start_date_dt,$end_date_dt,$price){
        $message = \Swift_Message::newInstance()
            ->setSubject("Congrats! Here is your reservation info - $reservartionCode")
            ->setFrom('send@example.com')
            ->setTo('jotaememoreno@gmail.com')
            ->setBody(
                $this->renderView(
                    'booking/email/booking.html.twig',
                    array(
                        'name' => $client->getUsername(),
                        'reservationCode' => $reservartionCode,
                        'startDate'=>$start_date_dt->format('Y-m-d H:i'),
                        'endDate'=>$end_date_dt->format('Y-m-d H:i'),
                        'price'=>$price
                    )
                ),
                'text/html'
            );
        $this->get('mailer')->send($message);
    }
}
