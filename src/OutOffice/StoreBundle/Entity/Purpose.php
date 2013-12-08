<?php

namespace OutOffice\StoreBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Column;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * @Entity
 */
class Purpose {
	/**
	 *	@Id	@GeneratedValue
	 * @Column(type="integer")
	 */
	private $id;
	/**
	 *	@Column(type="string", nullable=true)
	 */
	private $name;
	/**
	 *	@Column(type="string", nullable=true)
	 */
	private $description;
	
	

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Get id
     *
     * @return integer
     */
    public function setId($id)
    {
    	 $this->id = $id;
    
        return $this;
    }
    

    /**
     * Set name
     *
     * @param string $name
     * @return Purpose
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Purpose
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
}