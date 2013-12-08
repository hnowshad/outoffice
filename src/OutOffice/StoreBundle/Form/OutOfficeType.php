<?php

namespace OutOffice\StoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class OutOfficeType extends AbstractType{
	public function buildForm(FormBuilderInterface $builder, array $options){
		$builder->add("outDate", "date", array(
												'widget' => 'single_text',
												'format' => 'dd-MM-yyyy',
										 )
					 )
				->add("timeOut", "time", array('required'=> true))
				->add("timeInExpected", "time", array('required'=> true))
				->add("timeInActual", "time", array('required'=> false))
				->add("details","textarea", array('required'=> false));
	
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => 'OutOffice\StoreBundle\Entity\OutOffice',
		));
	}
	
	public function getName()
	{
		return 'outOfficeeee';
	}
}

?>