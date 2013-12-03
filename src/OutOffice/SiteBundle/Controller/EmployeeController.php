<?php

namespace OutOffice\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use OutOffice\StoreBundle\Entity\User;
use OutOffice\StoreBundle\Entity\OutOffice;

class EmployeeController extends Controller{
	/**
	 * @Route("/employeeHomePage", name="employee_homepage")
	 */
	public function employeeHomePageAction(Request $request){
		$loggedInUser = $this->getUser();
		
		
		$outOffice = new OutOffice();
		$form= $this->createFormBuilder($outOffice)
					->add("outDate", "text")
					->add("timeOut", "text")
					->add("timeInExpected", "text")
					->add("timeInActual", "text")
					->add("details","textarea")
					->getForm();
		$form->handleRequest($request);
	
		return $this->render("OutOfficeSiteBundle:Employee:schedulePage.html.twig",
								array(
									"outOffice" => $form->createView(),
							 	)
					);
	//	return new Response("employee page " . $loggedInUser->getFirstName());
	}
}

?>