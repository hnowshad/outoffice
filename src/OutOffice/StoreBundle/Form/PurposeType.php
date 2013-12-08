<?php

namespace OutOffice\StoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityManager;
class PurposeType extends AbstractType{
	
	private $purposes;
	
	public function __construct($purposes = null)
	{
		$this->purposes = $purposes;
	}
	
	
	public function buildForm(FormBuilderInterface $builder, array $options){
		//$purposes = $this->em->getRepository("OutOfficeStoreBundle:Purpose")->findAll();
		
		$purposeOptions = array();
		foreach ($this->purposes as $purpose){
			$purposeOptions[$purpose->getId()] =  ($purpose->getName());
		}
		 
		$builder->add("id", "choice", array(
							    'choices' => $purposeOptions,
								
				 ));
	
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => 'OutOffice\StoreBundle\Entity\Purpose',
		));
	}
	
	public function getName()
	{
		return 'purrrposse';
	}
}

?>