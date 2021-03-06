<?php

namespace SaleProductBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SaleProductBundle\Entity\Sale;
use SaleProductBundle\Form\SaleType;

/**
 * Sale controller.
 *
 * @Route("/sale")
 */
class SaleController extends Controller
{
    /**
     * Lists all Sale entities.
     *
     * @Route("/", name="sale_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sales = $em->getRepository('SaleProductBundle:Sale')->findBy([],['createdAt' => 'DESC']);

        return $this->render('sale/index.html.twig', array(
            'sales' => $sales,
        ));
    }

    /**
     * Creates a new Sale entity.
     *
     * @Route("/new", name="sale_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sale = new Sale();
        $form = $this->createForm('SaleProductBundle\Form\SaleType', $sale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $sale->setPrice($sale->getProduct()->getPrice()*$sale->getQuantity());
            $sale->setCreatedAt(new \DateTime());
            $sale->setUpdatedAt(new \DateTime());
            $sale->setReturnPrice($sale->getValue() - $sale->getPrice());

            $product = $sale->getProduct();

            $quantity = $product->getQuantity()-$sale->getQuantity();
            $product->setQuantity($quantity);

            $em->persist($product);
            $em->persist($sale);
            $em->flush();

            return $this->redirectToRoute('sale_show', array('id' => $sale->getId()));
        }

        return $this->render('sale/new.html.twig', array(
            'sale' => $sale,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Sale entity.
     *
     * @Route("/{id}", name="sale_show")
     * @Method("GET")
     */
    public function showAction(Sale $sale)
    {
        $deleteForm = $this->createDeleteForm($sale);

        return $this->render('sale/show.html.twig', array(
            'sale' => $sale,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Sale entity.
     *
     * @Route("/{id}/edit", name="sale_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Sale $sale)
    {
        $deleteForm = $this->createDeleteForm($sale);
        $editForm = $this->createForm('SaleProductBundle\Form\SaleType', $sale);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sale);
            $em->flush();

            return $this->redirectToRoute('sale_edit', array('id' => $sale->getId()));
        }

        return $this->render('sale/edit.html.twig', array(
            'sale' => $sale,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Sale entity.
     *
     * @Route("/{id}", name="sale_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Sale $sale)
    {
        $form = $this->createDeleteForm($sale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sale);
            $em->flush();
        }

        return $this->redirectToRoute('sale_index');
    }

    /**
     * Creates a form to delete a Sale entity.
     *
     * @param Sale $sale The Sale entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Sale $sale)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sale_delete', array('id' => $sale->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
