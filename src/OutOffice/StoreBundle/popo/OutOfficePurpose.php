<?php

namespace OutOffice\StoreBundle\popo;

use OutOffice\StoreBundle\Entity\OutOffice;
use OutOffice\StoreBundle\Entity\Purpose;
class OutOfficePurpose {
	public $outOffice;
	public $purpose;
	
	public function __construct(){
		$outOffice = new OutOffice();
		$purpose = new Purpose();
	}
}

?>