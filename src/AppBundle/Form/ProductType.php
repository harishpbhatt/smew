<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProductType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	$builder
    	->add('client', EntityType::class, array(
    			// query choices from this entity
    			'class' => 'AppBundle:Client',
    			'placeholder' => 'Please select client',
    			
    			// use the User.username property as the visible option string
    			'choice_label' => 'title',
    			'choice_value' => 'id',
    			
    			// used to render a select box, check boxes or radios
    			// 'multiple' => true,
    			// 'expanded' => true,
    	))
    	->add('name', TextareaType::class, array('label' => 'Product Details'))->add('drawingcode', TextType::class, array('required' => false))->add('unitprice');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Product'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_product';
    }


}
