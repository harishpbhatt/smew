<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class InvoiceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	$this->em = $options['em'];
    	$builder
    	->add('company', EntityType::class, array(
    			// query choices from this entity
    			'class' => 'AppBundle:Company',
    			'placeholder' => 'Please select your company',
    			
    			// use the User.username property as the visible option string
    			'choice_label' => 'name',
    			'choice_value' => 'id',
    			
    			'choice_attr' => function($val, $key, $index) {
    			// adds a class like attending_yes, attending_no, etc
    			$invoiceRepo = $this->em->getRepository('AppBundle:Invoice');
    			$highestId = (int)$invoiceRepo->getHighestId($val);    	
    			$highestId = $highestId + 1;
    			
    			$time = new \DateTime();
    			$todaysDate = $time->format('d-m-Y');
    			$currentYear = $time->format('Y');
    			$nextYear = $currentYear + 1;
    			$invoiceNoSuggestion = 'MH|'.$highestId.'|'.$currentYear.'-'.$nextYear;
    			
    			return ['data-invoicenosuggestion' => $invoiceNoSuggestion,'data-manualid' => $highestId];
    			},
    			// used to render a select box, check boxes or radios
    			// 'multiple' => true,
    			// 'expanded' => true,
    	))    	
    	->add('manualid', HiddenType::class)
    	->add('invoiceNo', TextType::class)
    	->add('invoiceDate', TextType::class)
    	->add('challanNo', TextType::class)
    	->add('challanDate', TextType::class)
    	->add('poNo', TextType::class)
    	->add('poDate', TextType::class)
    	->add('poNo2', TextType::class)
    	->add('poDate2', TextType::class)
    	->add('gstPercentage', TextType::class)
    	->add('client', EntityType::class, array(
    			// query choices from this entity
    			'class' => 'AppBundle:Client',
    			'placeholder' => 'Please select your client',
    			
    			// use the User.username property as the visible option string
    			'choice_label' => 'title',
    			'choice_value' => 'id',
    			// used to render a select box, check boxes or radios
    			// 'multiple' => true,
    			// 'expanded' => true,
    	));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Invoice',
        	'em' => null
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_invoice';
    }


}
