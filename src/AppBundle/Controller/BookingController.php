<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BookingController extends Controller
{

    /**
     * Creates a new booking entity.
     *
     */
    public function newAction(Request $request, BedRoom $bedRoom)
    {
        //TODO: Comprobar si el cliente que hace la reserva está logueado, sino lo esta ¿redirigir a login?

        die;
    }
}
