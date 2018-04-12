<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Invoice;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Invoice controller.
 *
 * @Route("invoice")
 */
class InvoiceController extends Controller
{
    /**
     * Lists all invoice entities.
     *
     * @Route("/", name="invoice_index")
     * @Method("GET")
     */
	public function indexAction(Request $request)
    {
    	$company = $request->get('company');
        $em = $this->getDoctrine()->getManager();

        $companies = $em->getRepository('AppBundle:Company')->findAll();
        if($company > 0)
        {
        	$invoices = $em->getRepository('AppBundle:Invoice')->findAllByCompany($company);        	
        }
        else
        {
        	$invoices = $em->getRepository('AppBundle:Invoice')->findAll();        	
        }

        return $this->render('invoice/index.html.twig', array(
            'invoices' => $invoices,
        	'companies' => $companies,
        	'selectedcompany' => $company,
        ));
    }

    /**
     * Creates a new invoice entity.
     *
     * @Route("/new", name="invoice_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $invoice = new Invoice();
        
        /* set default parameters for adding invoice started */
        $time = new \DateTime();
        $todaysDate = $time->format('d-m-Y');
        $currentYear = $time->format('Y');
        $nextYear = $currentYear + 1;
        $invoice->setTodaysDate($todaysDate);
        $invoice->setInvoiceDate($todaysDate);
        $invoice->setChallanDate($todaysDate);
        $invoice->setPoDate($todaysDate);
        $invoice->setPoDate2($todaysDate);
        
        $em = $this->getDoctrine()->getManager();
        /*$invoiceRepo = $em->getRepository('AppBundle:Invoice');
        $highestId = (int)$invoiceRepo->getHighestId();
        $highestId = $highestId + 1;
        $invoiceNoSuggestion = 'MH|'.$highestId.'|'.$currentYear.'-'.$nextYear;
        
        $invoice->setInvoiceNo($invoiceNoSuggestion);
        $invoice->setChallanNo($invoiceNoSuggestion);
        $invoice->setPoNo($invoiceNoSuggestion);
        $invoice->setPoNo2($invoiceNoSuggestion);*/
        /* set default parameters for adding invoice ended */
        
        $form = $this->createForm('AppBundle\Form\InvoiceType', $invoice,array('em'=>$em));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($invoice);
            $em->flush();

            return $this->redirectToRoute('invoice_show', array('id' => $invoice->getId()));
        }

        return $this->render('invoice/new.html.twig', array(
            'invoice' => $invoice,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a invoice entity.
     *
     * @Route("/{id}", name="invoice_show")
     * @Method("GET")
     */
    public function showAction(Invoice $invoice)
    {
        $deleteForm = $this->createDeleteForm($invoice);

        return $this->render('invoice/show.html.twig', array(
            'invoice' => $invoice,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    /**
     * Finds and displays a invoice entity.
     *
     * @Route("/printpreview/{id}", name="invoice_print_preview")
     * @Method("GET")
     */
    public function printAction(Invoice $invoice)
    {
    	$deleteForm = $this->createDeleteForm($invoice);
    	
    	return $this->render('invoice/printpreview.html.twig', array(
    			'invoice' => $invoice,
    			'delete_form' => $deleteForm->createView(),
    	));
    }

    /**
     * Displays a form to edit an existing invoice entity.
     *
     * @Route("/{id}/edit", name="invoice_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Invoice $invoice)
    {
        $deleteForm = $this->createDeleteForm($invoice);
        $em = $this->getDoctrine()->getManager();
        $editForm = $this->createForm('AppBundle\Form\InvoiceType', $invoice,array('em'=>$em));
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('invoice_show', array('id' => $invoice->getId()));
        }

        return $this->render('invoice/edit.html.twig', array(
            'invoice' => $invoice,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a invoice entity.
     *
     * @Route("/{id}", name="invoice_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Invoice $invoice)
    {
        $form = $this->createDeleteForm($invoice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($invoice);
            $em->flush();
        }

        return $this->redirectToRoute('invoice_index');
    }

    /**
     * Creates a form to delete a invoice entity.
     *
     * @param Invoice $invoice The invoice entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Invoice $invoice)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('invoice_delete', array('id' => $invoice->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
