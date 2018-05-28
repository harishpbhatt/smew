<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * Login controller.
 *
 */
class LoginController extends Controller
{
    /**
     * Creates a new login entity.
     *
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {	
    	$authenticationUtils = $this->get('security.authentication_utils');
    	
    	// get the login error if there is any
    	$error = $authenticationUtils->getLastAuthenticationError();
    	
    	// get last username entered by the user
    	$lastUsername = $authenticationUtils->getLastUsername();
    	
    	return $this->render('login/login.html.twig',array(
    			'last_username' => $lastUsername,
    			'error' => $error
    	));
    }
}
