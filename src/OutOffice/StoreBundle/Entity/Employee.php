<?php

namespace OutOffice\StoreBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Column;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * @Entity
 */
class Employee{
	/**
	 *	@Id	@GeneratedValue
	 * @Column(type="integer")
	 */
	private $id;

	/**
	 *	@OneToOne(targetEntity="User", inversedBy="id")
	 */
	private $user;
	/**
	 *	@Column(type="string")
	 */
	private $name;
	/**
	 *	@Column(type="string", nullable=true)
	 */
	private $email;
	/**
	 *	@Column(type="string", nullable=true)
	 */
	private $designation;
	/**
	 *	@Column(type="string", nullable=true)
	 */
	private $department;
	/**
	 *	@Column(type="date", nullable=true)
	 */
	private $joinDate;
	/**
	 *	@Column(type="date", nullable=true)
	 */
	private $releaseDate;

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
     * Set name
     *
     * @param string $name
     * @return Employee
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
     * Set email
     *
     * @param string $email
     * @return Employee
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set designation
     *
     * @param string $designation
     * @return Employee
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;
    
        return $this;
    }

    /**
     * Get designation
     *
     * @return string 
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set department
     *
     * @param string $department
     * @return Employee
     */
    public function setDepartment($department)
    {
        $this->department = $department;
    
        return $this;
    }

    /**
     * Get department
     *
     * @return string 
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set joinDate
     *
     * @param \DateTime $joinDate
     * @return Employee
     */
    public function setJoinDate($joinDate)
    {
        $this->joinDate = $joinDate;
    
        return $this;
    }

    /**
     * Get joinDate
     *
     * @return \DateTime 
     */
    public function getJoinDate()
    {
        return $this->joinDate;
    }

    /**
     * Set releaseDate
     *
     * @param \DateTime $releaseDate
     * @return Employee
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    
        return $this;
    }

    /**
     * Get releaseDate
     *
     * @return \DateTime 
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set user
     *
     * @param \OutOffice\StoreBundle\Entity\User $user
     * @return Employee
     */
    public function setUser(\OutOffice\StoreBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \OutOffice\StoreBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}