<?php

namespace CatBundle\Controller;

use CatBundle\Entity\Lost;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Lost controller.
 *
 * @Route("lost")
 */
class LostController extends Controller
{
    /**
     * Lists all lost entities.
     *
     * @Route("/", name="lost_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $losts = $em->getRepository('CatBundle:Lost')->findAll();
        if($this->getUser()) {
            $currentUser = $this->getUser();
            $currentUserId = $currentUser->getId();
        } else {
            $currentUserId = -1;
        }


        return $this->render('lost/index.html.twig', array(
            'losts' => $losts,
            'currentUserId' => $currentUserId,
        ));
    }

    /**
     * Creates a new lost entity.
     *
     * @Route("/new", name="lost_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $lost = new Lost();
        $form = $this->createForm('CatBundle\Form\LostType', $lost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $lost->setUserId($user->getId());
            $em = $this->getDoctrine()->getManager();
            $em->persist($lost);
            $em->flush($lost);

            return $this->redirectToRoute('lost_show', array('id' => $lost->getId()));
        }

        return $this->render('lost/new.html.twig', array(
            'lost' => $lost,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a lost entity.
     *
     * @Route("/{id}", name="lost_show")
     * @Method("GET")
     */
    public function showAction(Lost $lost)
    {
        $deleteForm = $this->createDeleteForm($lost);
        $userManager = $this->get('fos_user.user_manager');
        $userId = $lost->getUserId();
        $user = $userManager->findUserBy(array('id'=> $userId));
        if($this->getUser()) {
            $currentUser = $this->getUser();
            $currentUserId = $currentUser->getId();
        } else {
            $currentUserId = -1;
        }

        return $this->render('lost/show.html.twig', array(
            'lost' => $lost,
            'delete_form' => $deleteForm->createView(),
            'user' => $user,
            'currentUserId' => $currentUserId,
        ));
    }

    /**
     * Displays a form to edit an existing lost entity.
     *
     * @Route("/{id}/edit", name="lost_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Lost $lost)
    {
        $deleteForm = $this->createDeleteForm($lost);
        $editForm = $this->createForm('CatBundle\Form\LostType', $lost);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lost_edit', array('id' => $lost->getId()));
        }

        return $this->render('lost/edit.html.twig', array(
            'lost' => $lost,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a lost entity.
     *
     * @Route("/{id}", name="lost_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Lost $lost)
    {
        $form = $this->createDeleteForm($lost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lost);
            $em->flush($lost);
        }

        return $this->redirectToRoute('lost_index');
    }

    /**
     * Creates a form to delete a lost entity.
     *
     * @param Lost $lost The lost entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Lost $lost)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lost_delete', array('id' => $lost->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
