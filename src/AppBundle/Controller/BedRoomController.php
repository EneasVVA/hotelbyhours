<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BedRoom;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Bedroom controller.
 *
 */
class BedRoomController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bedRooms = $em->getRepository('AppBundle:BedRoom')->findAll();

        return $this->render('bedroom/index.html.twig', array(
            'bedRooms' => $bedRooms,
        ));
    }
    /**
     * Lists all bedRoom entities.
     *
     */
    public function resultsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $name = null;
        if(!empty( $request->get('name'))) {
            $name = $request->get('name');
        }

        $location = null;
        if(!empty( $request->get('location') )) {
            $location = $request->get('location');
        }

        $startDate = new DateTime();
        if(!empty( $request->get('start-dd'))) {
            $startDate = new DateTime($request->get('start-dd'));
        }

        $endDate = new DateTime('+ 1 day');
        if(!empty( $request->get('end-dd'))) {
            $endDate = new DateTime($request->get('end-dd'));
        }

        $bedRooms = $em->getRepository('AppBundle:BedRoom')->search($name, $location, $startDate, $endDate);

        dump($bedRooms);
        return $this->render('bedroom/results.html.twig', array(
            'bedRooms' => $bedRooms,
        ));
    }

    /**
     * Creates a new bedRoom entity.
     *
     */
    public function newAction(Request $request)
    {
        $bedRoom = new Bedroom();
        $form = $this->createForm('AppBundle\Form\BedRoomType', $bedRoom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bedRoom);
            $em->flush();

            return $this->redirectToRoute('bedroom_show', array('id' => $bedRoom->getId()));
        }

        return $this->render('bedroom/new.html.twig', array(
            'bedRoom' => $bedRoom,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bedRoom entity.
     *
     */
    public function showAction(BedRoom $bedRoom)
    {
        $deleteForm = $this->createDeleteForm($bedRoom);

        return $this->render('bedroom/show.html.twig', array(
            'bedRoom' => $bedRoom,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bedRoom entity.
     *
     */
    public function editAction(Request $request, BedRoom $bedRoom)
    {
        $deleteForm = $this->createDeleteForm($bedRoom);
        $editForm = $this->createForm('AppBundle\Form\BedRoomType', $bedRoom);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bedroom_edit', array('id' => $bedRoom->getId()));
        }

        return $this->render('bedroom/edit.html.twig', array(
            'bedRoom' => $bedRoom,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bedRoom entity.
     *
     */
    public function deleteAction(Request $request, BedRoom $bedRoom)
    {
        $form = $this->createDeleteForm($bedRoom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bedRoom);
            $em->flush();
        }

        return $this->redirectToRoute('bedroom_index');
    }

    /**
     * Creates a form to delete a bedRoom entity.
     *
     * @param BedRoom $bedRoom The bedRoom entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(BedRoom $bedRoom)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bedroom_delete', array('id' => $bedRoom->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
