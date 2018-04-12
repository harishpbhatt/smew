<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ClientType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	$builder  	
    	->add('company', EntityType::class, array(
    			// query choices from this entity
    			'class' => 'AppBundle:Company',
    			'placeholder' => 'Please select company',
    			
    			// use the User.username property as the visible option string
    			'choice_label' => 'name',
    			'choice_value' => 'id',
    			
    			// used to render a select box, check boxes or radios
    			// 'multiple' => true,
    			// 'expanded' => true,
    	))
    	->add('title')->add('gstno')->add('street', TextareaType::class, array('label' => 'Address'))->add('city')->add('state')->add('pincode');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Client'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_client';
    }


}
