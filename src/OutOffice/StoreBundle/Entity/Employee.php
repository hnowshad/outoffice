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
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Entity(repositoryClass="EmployeeRepository")
 * @Table(name="employee", uniqueConstraints={@UniqueConstraint(name="employee_unique_index", columns={"email"})})
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
	private $firstName;
	
	/**
	 *	@Column(type="string")
	 */
	private $lastName;
	
	/**
	 *	@Column(type="string", nullable=true, unique=true)
	 *	@Assert\Email()
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

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Employee
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Employee
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }
}