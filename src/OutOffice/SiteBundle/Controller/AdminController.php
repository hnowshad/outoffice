<?php

namespace OutOffice\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use OutOffice\StoreBundle\Entity\User;
use OutOffice\StoreBundle\Entity\Employee;

class AdminController extends Controller{
	/**
	 * @Route("/adminHomePage", name="admin_homepage")
	 */
	public function adminHomePageAction(Request $request){
		$loggedInUser = $this->getUser();
		$log = $this->get('logger');
		$em = $this->getDoctrine()->getManager();
		
	
		//save employee
		$employee = new Employee();
		
		$error = "";
		$form = $this->createFormBuilder($employee)
						->add("firstName")
						->add("lastName")
						->add("email")
						->add("department")
						->add("designation")
						->add("joinDate", "date", array(
								'widget' => 'single_text',
								'format' => 'dd-MM-yyyy',
						))
						->add("releaseDate", "date", array(
								'widget' => 'single_text',
								'format' => 'dd-MM-yyyy',
								'required' => false,
						))
						->getForm();
		
		$form->handleRequest($request);

		if($form->isValid()){
			echo "<br>form valid";
			$employee = $form->getData();
			
			$error = $this->checkUserValidation($employee);
			
			if(!isset($error) ){
				$user = $this->createUser($employee);
				$em->persist($user);
				$em->flush();
			
				$employee->setUser($user);
					
				$em->persist($employee);
					
					
				$em->flush();
			}
			
				
		}
		//save employee ends
		
		
		return $this->render("OutOfficeSiteBundle:Admin:adminPage.html.twig",
								array(
										"employee" => $form->createView(),
										"error" => $error,
							 	)
					);
	}
	
	
	
	
	
	
	
	private function checkUserValidation($employee){
			if($this->isEmailExists($employee)){
				$error = "Email address already exist";
				return $error;
			}
			return null;
	}
	private function isEmailExists($employee){
		$em = $this->getDoctrine()->getManager();
		$user = $em->getRepository("OutOfficeStoreBundle:User")->findOneByUsername($employee->getEmail());
		if(isset($user)){
			return true;
		}
		return false;
	}

	
	private function createUser($employee){
		$em = $this->getDoctrine()->getManager();
		
		$user = new User();

		$user->setFirstName($employee->getFirstName());
		$user->setLastName($employee->getLastName());
		
		$role = $em->getRepository("OutOfficeStoreBundle:Role")->findOneByRole("ROLE_EMPLOYEE");
		$user->addRole($role);
		
		//set password
		$factory = $this->get("security.encoder_factory");
		$encoder = $factory->getEncoder($user);
		$password = $encoder->encodePassword('a', $user->getSalt());
		$user->setPassword($password);
		
		$user->setUsername($employee->getEmail());
		
		return $user;
	}
	
	
}

?>