<?php
declare(strict_types=1);
namespace CatBundle\Tests\Controller;
use CatBundle\Entity\Found;
use PHPUnit\Framework\TestCase;

/**
 * Creates a new found entity.
 *
 * @Route("/new", name="found_new")
 * @Method({"GET", "POST"})
 */

final class FoundControllerTest extends TestCase
{
    public function testAddNewCat()
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

    public function testEmpty()
    {
        $stack = [];
        $this->assertEmpty($stack);

        return $stack;
    }
}
