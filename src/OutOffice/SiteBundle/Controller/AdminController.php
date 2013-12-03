<?php

namespace OutOffice\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use OutOffice\StoreBundle\Entity\User;

class AdminController extends Controller{
	/**
	 * @Route("/adminHomePage", name="admin_homepage")
	 */
	public function adminHomePageAction(Request $request){
		$loggedInUser = $this->getUser();
	
		return new Response("This is admin home page ". $loggedInUser->getFirstName());
	}
	
}

?>