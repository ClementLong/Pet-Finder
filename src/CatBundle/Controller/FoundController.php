<?php

namespace CatBundle\Controller;

use CatBundle\Entity\Found;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Found controller.
 *
 * @Route("found")
 */
class FoundController extends Controller
{
    /**
     * Lists all found entities.
     *
     * @Route("/", name="found_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $founds = $em->getRepository('CatBundle:Found')->findAll();

        return $this->render('found/index.html.twig', array(
            'founds' => $founds,
        ));
    }

    /**
     * Creates a new found entity.
     *
     * @Route("/new", name="found_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $found = new Found();
        $form = $this->createForm('CatBundle\Form\FoundType', $found);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($found);
            $em->flush($found);

            return $this->redirectToRoute('found_show', array('id' => $found->getId()));
        }

        return $this->render('found/new.html.twig', array(
            'found' => $found,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a found entity.
     *
     * @Route("/{id}", name="found_show")
     * @Method("GET")
     */
    public function showAction(Found $found)
    {
        $deleteForm = $this->createDeleteForm($found);

        return $this->render('found/show.html.twig', array(
            'found' => $found,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing found entity.
     *
     * @Route("/{id}/edit", name="found_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Found $found)
    {
        $deleteForm = $this->createDeleteForm($found);
        $editForm = $this->createForm('CatBundle\Form\FoundType', $found);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('found_edit', array('id' => $found->getId()));
        }

        return $this->render('found/edit.html.twig', array(
            'found' => $found,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a found entity.
     *
     * @Route("/{id}", name="found_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Found $found)
    {
        $form = $this->createDeleteForm($found);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($found);
            $em->flush($found);
        }

        return $this->redirectToRoute('found_index');
    }

    /**
     * Creates a form to delete a found entity.
     *
     * @param Found $found The found entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Found $found)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('found_delete', array('id' => $found->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
