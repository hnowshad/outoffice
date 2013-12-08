<?php

namespace OutOffice\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use OutOffice\StoreBundle\Entity\User;
use OutOffice\StoreBundle\Entity\OutOffice;
use OutOffice\StoreBundle\popo\OutOfficePurpose;
use OutOffice\StoreBundle\Form\PurposeType;
use OutOffice\StoreBundle\Form\OutOfficeType;
use OutOffice\StoreBundle\Entity\Purpose;
use OutOffice\StoreBundle\Entity\Employee;

class EmployeeController extends Controller{
	
	/**
	 * @Route("/employeeHomePage", name="employee_homepage")
	 */
	public function employeeHomePageAction(Request $request){
		$log = $this->get('logger');
		$em = $this->getDoctrine()->getManager();
		
		$loggedInUser = $this->getUser();
		
		$outOfficePurpose = new OutOfficePurpose();
		$purposes = $em->getRepository("OutOfficeStoreBundle:Purpose")->findAll();
		
		$form = $this->createFormBuilder($outOfficePurpose)
					 ->add("purpose", new PurposeType($purposes))
					 ->add("outOffice", new OutOfficeType())
					 ->getForm();
		
		$form->handleRequest($request);
		$error = "";
		
		//var_dump($this->getErrorMessages($form));
		
		if($form->isValid()){
			$outOfficePurpose = $form->getData();
			
			$log->info("----------------saming--------------");
			
			$error = $this->checkOutOfficeScheduleFormValidation($outOfficePurpose->outOffice);
			if(!isset($error) ){
				$purpose = $this->findPurposeById($outOfficePurpose->purpose->getId(), $purposes);
				$outOfficePurpose->outOffice->setPurpose($purpose);
				
				$employee = $loggedInUser->getEmployee();
				
				$outOfficePurpose->outOffice->setEmployee($employee);
				
				$em->persist($outOfficePurpose->outOffice);
				
				
				$em->flush();
			}
		}
		
		return $this->render("OutOfficeSiteBundle:Employee:schedulePage.html.twig",
								array(
									"outOfficePurpose" => $form->createView(),
									"error" => $error,
							 	)
					);
	}
	
	/* private function getErrorMessages(\Symfony\Component\Form\Form $form) {
		$errors = array();
		foreach ($form->getErrors() as $key => $error) {
			$template = $error->getMessageTemplate();
			$parameters = $error->getMessageParameters();
	
			foreach ($parameters as $var => $value) {
				$template = str_replace($var, $value, $template);
			}
	
			$errors[$key] = $template;
		}
		if ($form->count()) {
			foreach ($form as $child) {
				if (!$child->isValid()) {
					$errors[$child->getName()] = $this->getErrorMessages($child);
				}
			}
		}
		return $errors;
	} */
	
	private function checkOutOfficeScheduleFormValidation($outOffice){
		$error = $this->checkGreaterThan($outOffice);
		if(!isset($error) ){
			$error = $this->checkDuplicateScheduleExist($outOffice);
		}
		if(isset($error)  && $error != ""){
			return $error;
		}
	}
	
	private function checkDuplicateScheduleExist($outOffice){
		$conn = $this->get('database_connection');
		$result = $conn->fetchAll("SELECT count(id) as count FROM `outoffice` WHERE outDate='{$outOffice->getOutDate()->format('Y-m-d')}'");
		foreach ($result as $row){
			if($row['count'] > 0){
				return "Sorry!! Cannot create two schedule on same day";
			}
		}
		return null;
	}
	
	private function checkGreaterThan($outOffice){
		if($outOffice->getTimeInExpected() < $outOffice->getTimeOut()){
			return "Time out should be less than Time In Expected";
		}else if(($outOffice->getTimeInActual() != "" ) && 
						($outOffice->getTimeInActual() < $outOffice->getTimeOut() )){
			return "Time out should be less than time in actual";
		}
		return null;
	}
	
	private function findPurposeById($id, $purposes){
		foreach ($purposes as $purpose){
			if($purpose->getId() === $id){
				return $purpose;
			}
		}
		return null;
	}
}

?>