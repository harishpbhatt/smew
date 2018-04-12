<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Client;
use AppBundle\Entity\Product;
use AppBundle\Repository\ProductRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class InvoiceProductType extends AbstractType
{	
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	$this->client = $options['client'];
    	$builder->add('invoice', EntityType::class, array(
    			'attr' => array('readonly' => 'true'),
    			// query choices from this entity
    			'class' => 'AppBundle:Invoice',
    			'placeholder' => 'Please select your invoice',
    			
    			// use the User.username property as the visible option string
    			'choice_label' => 'id',
    			'choice_value' => 'id',
    			
    			// used to render a select box, check boxes or radios
    			// 'multiple' => true,
    			// 'expanded' => true,
    	))->add('product', EntityType::class, array(
    			'attr' => array('class' => 'js-product'),
    			// query choices from this entity
    			'class' => 'AppBundle:Product',
    			'query_builder' => function (ProductRepository $er) {
	    			return $er->createQueryBuilder('p')
	    			->where('p.client = :client')
	    			->orderBy('p.drawingcode', 'ASC')
	    			->setParameter('client', $this->client);
	    			},
    			'placeholder' => 'Please select your product',
    			
    			// use the User.username property as the visible option string
    			'choice_label' => function(Product $p){
    				if($p->getDrawingCode() != '')
    				{    					
    					return $p->getDrawingCode()." - ".$p->getName();
    				}
    				else
    				{
    					return $p->getName();
    				}
    			},
    			'choice_attr' => function($val, $key, $index) {
    			// adds a class like attending_yes, attending_no, etc
    			return ['data-product-name' => $val->getName()
    					,'data-product-drawingcode' => $val->getDrawingcode()
    					,'data-product-unitprice' => $val->getUnitprice()
    			];
    			},
    			'choice_value' => 'id',
    			
    			// used to render a select box, check boxes or radios
    			// 'multiple' => true,
    			// 'expanded' => true,
    			))->add('quantity')->add('hsnno')
    			->add('name', TextareaType::class, array('label' => 'Product Details','attr' => array('readonly' => 'true','class' => 'js-product-name')))
    			->add('drawingcode', TextType::class, array('required' => false,'attr' => array('readonly' => 'true','class' => 'js-product-drawingcode')))
    			->add('unitprice', TextType::class, array('attr' => array('readonly' => 'true','class' => 'js-product-unitprice')));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\InvoiceProduct',
        	'client' => null
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_invoiceproduct';
    }


}
