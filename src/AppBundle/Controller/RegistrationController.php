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

namespace AppBundle\Controller;

use AppBundle\Entity\User\Client;
use AppBundle\Entity\User\Responsible;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * @author Eneas Macías <emacias@ces.vocento.com>
 */
class RegistrationController extends Controller
{
    public function registerClientAction()
    {

        return $this->container
            ->get('pugx_multi_user.registration_manager')
            ->register(Client::class );
    }

    public function registerResponsibleAction()
    {
        return $this->container
            ->get('pugx_multi_user.registration_manager')
            ->register(Responsible::class );
    }
}