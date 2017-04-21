<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BedRoom;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Bedroom controller.
 *
 */
class BedRoomController extends Controller
{
    /**
     * Lists all bedRoom entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bedRooms = $em->getRepository('AppBundle:BedRoom')->findAll();

        return $this->render('bedroom/index.html.twig', array(
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
