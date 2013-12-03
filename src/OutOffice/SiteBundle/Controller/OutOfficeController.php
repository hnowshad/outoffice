<?php

namespace OutOffice\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use OutOffice\StoreBundle\Entity\User;

class OutOfficeController extends Controller{
	
	/**
	 * @Route("/homepage")
	 */
	public function homepageAction(Request $request){
		$loggedInUser = $this->getUser();
		$isEmployee = $this->get('security.context')->isGranted('ROLE_EMPLOYEE', $loggedInUser);
		if($isEmployee){
			return $this->redirect($this->generateUrl("employee_homepage"));
		}else{
			$isEmployee = $this->get('security.context')->isGranted('ROLE_ADMIN', $loggedInUser);
			return $this->redirect($this->generateUrl("admin_homepage"));
		}
		//print_r($loggedInUser->getRoles()->);
		
	//	return $this->redirect($this->generateUrl("admin_homepage"));
		
	}
}

?>