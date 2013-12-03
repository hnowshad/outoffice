<?php

namespace OutOffice\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use OutOffice\StoreBundle\Entity\Role;
use OutOffice\StoreBundle\Entity\User;
use OutOffice\StoreBundle\Entity\Employee;

class CrudController extends Controller{
	/**
	 * @Route("/createRole", name="crud_create_role")
	 */
	public function createRoleAction(){
		$this->setup();
	
		$role = new Role();
		$role->setName("Role for employee");
		$role->setRole("ROLE_EMPLOYEE");
		$this->em->persist($role);
	
		$this->em->flush();
	}
	
	/**
	 * @Route("/createUser", name="crud_create_user")
	 */
	public function createUserAction(){
		$this->setup();
	
		$user = new User();
		$user->setFirstName("Nowshad");
		
		/////password encoding//
		//$user->setSalt("a");
		$factory = $this->get("security.encoder_factory");
		$encoder = $factory->getEncoder($user);
		$password = $encoder->encodePassword('a', $user->getSalt());
		$user->setPassword($password);
		///password encoding ends//
		
		$user->setUsername("nowshad@nowshad.com");
	
		$role = $this->em->getRepository("OutOfficeStoreBundle:Role")->findOneByRole("ROLE_EMPLOYEE");
		$user->addRole($role);
		$this->em->persist($user);
		///creation of user done.. now create employee information
		
		$employee = new Employee();
		$employee->setDepartment("Engineer");
		$employee->setDesignation("Software Engineer");
		$employee->setEmail($user->getUsername());
		$employee->setJoinDate(new \DateTime());
		$employee->setName($user->getFirstName() . " " . $user->getLastName());
		$employee->setUser($user);
		$this->em->persist($employee);
		
	
		$this->em->flush();
	
		return new Response("Done");
	}
	
	
	
	
	
	
	private function setup(){
		$this->log = $this->get('logger');
		$this->log->info("setup--------------\n\n");
		$this->em  = $this->getDoctrine()->getManager();
	}
}

?>