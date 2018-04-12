<?php

namespace AppBundle\Controller;

use AppBundle\Entity\InvoiceProduct;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\InvoiceProductType;

/**
 * Invoiceproduct controller.
 *
 * @Route("invoiceproduct")
 */
class InvoiceProductController extends Controller
{
    /**
     * Lists all invoiceProduct entities.
     *
     * @Route("/{invoiceid}", name="invoiceproduct_index")
     * @Method("GET")
     */
	public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $invoiceid = $request->get('invoiceid');

        $invoiceProducts = $em->getRepository('AppBundle:InvoiceProduct')->findByInvoice($invoiceid ,array('id' => 'DESC'));
		
        return $this->render('invoiceproduct/index.html.twig', array(
            'invoiceProducts' => $invoiceProducts,
        ));
    }

    /**
     * Creates a new invoiceProduct entity.
     *
     * @Route("/new/{invoiceid}", name="invoiceproduct_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
    	$invoiceid = $request->get('invoiceid');
    	$em = $this->getDoctrine()->getManager();
    	
    	$invoice = $em->getRepository('AppBundle:Invoice')->findOneById($invoiceid);
    	
        $invoiceProduct = new Invoiceproduct();
        
        /* set default parameters for adding invoice started */
        $invoiceProduct->setInvoice($invoice);
        
        $form = $this->createForm('AppBundle\Form\InvoiceProductType', $invoiceProduct,array('client'=>$invoice->getClient()));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($invoiceProduct);
            $em->flush();

            return $this->redirectToRoute('invoice_show', array('id' => $invoiceid));
        }

        return $this->render('invoiceproduct/new.html.twig', array(
            'invoiceProduct' => $invoiceProduct,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a invoiceProduct entity.
     *
     * @Route("/{id}/{invoiceid}", name="invoiceproduct_show")
     * @Method("GET")
     */
    public function showAction(Request $request, InvoiceProduct $invoiceProduct)
    {
        $deleteForm = $this->createDeleteForm($invoiceProduct,$request);

        return $this->render('invoiceproduct/show.html.twig', array(
            'invoiceProduct' => $invoiceProduct,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing invoiceProduct entity.
     *
     * @Route("/{id}/edit/{invoiceid}", name="invoiceproduct_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, InvoiceProduct $invoiceProduct)
    {
    	$invoiceid = $request->get('invoiceid');
    	$em = $this->getDoctrine()->getManager();
    	
    	$invoice = $em->getRepository('AppBundle:Invoice')->findOneById($invoiceid);
        $deleteForm = $this->createDeleteForm($invoiceProduct,$request);
        $editForm = $this->createForm('AppBundle\Form\InvoiceProductType', $invoiceProduct,array('client'=>$invoice->getClient()));
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('invoice_show', array('id' => $invoiceid));
        }

        return $this->render('invoiceproduct/edit.html.twig', array(
            'invoiceProduct' => $invoiceProduct,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a invoiceProduct entity.
     *
     * @Route("/{id}/{invoiceid}", name="invoiceproduct_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, InvoiceProduct $invoiceProduct)
    {
    	$invoiceid = $request->get('invoiceid');
    	$form = $this->createDeleteForm($invoiceProduct,$request);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($invoiceProduct);
            $em->flush();
        }

        return $this->redirectToRoute('invoice_show', array('id' => $invoiceid));
    }

    /**
     * Creates a form to delete a invoiceProduct entity.
     *
     * @param InvoiceProduct $invoiceProduct The invoiceProduct entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(InvoiceProduct $invoiceProduct, Request $request)
    {
        return $this->createFormBuilder()
        ->setAction($this->generateUrl('invoiceproduct_delete', array('id' => $invoiceProduct->getId(),'invoiceid' => $request->get('invoiceid'))))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
