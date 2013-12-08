<?php

namespace OutOffice\StoreBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Column;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Symfony\Component\Validator\Constraints\GreaterThan;

/**
 * @Entity
 */
class OutOffice {
	/**
	 *	@Id	@GeneratedValue
	 * @Column(type="integer")
	 */
	private $id;
	
	/**
	 *	@ManyToOne(targetEntity="Employee", inversedBy="id" )
	 */
	private $employee;
	
	/**
	 *	@ManyToOne(targetEntity="Purpose", inversedBy="id")
	 */
	private $purpose;
	/**
	 * @Column(type="date",  nullable=true)
	 * @var unknown
	 */
	private $outDate;
	/**
	 * @Column(type="time")
	 * @var unknown
	 */
	private $timeOut;
	/**
	 * @Column(type="time",  nullable=true)
	 * @var unknown
	 */
	private $timeInExpected;
	/**
	 * @Column(type="time")
	 * @var unknown
	 */
	private $timeInActual;
	
	/**
	 *	@Column(type="string",  nullable=true)
	 */
	private $details;
	

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
     * Set id
     *
     */
    public function setId($id)
    {
    	 $this->id = $id;
    
        return $this;
    }
    

    /**
     * Set outDate
     *
     * @param \DateTime $outDate
     * @return OutOffice
     */
    public function setOutDate($outDate)
    {
        $this->outDate = $outDate;
    
        return $this;
    }

    /**
     * Get outDate
     *
     * @return \DateTime 
     */
    public function getOutDate()
    {
        return $this->outDate;
    }

    /**
     * Set timeOut
     *
     * @param \DateTime $timeOut
     * @return OutOffice
     */
    public function setTimeOut($timeOut)
    {
        $this->timeOut = $timeOut;
    
        return $this;
    }

    /**
     * Get timeOut
     *
     * @return \DateTime 
     */
    public function getTimeOut()
    {
        return $this->timeOut;
    }

    /**
     * Set timeInExpected
     *
     * @param \DateTime $timeInExpected
     * @return OutOffice
     */
    public function setTimeInExpected($timeInExpected)
    {
        $this->timeInExpected = $timeInExpected;
    
        return $this;
    }

    /**
     * Get timeInExpected
     *
     * @return \DateTime 
     */
    public function getTimeInExpected()
    {
        return $this->timeInExpected;
    }

    /**
     * Set timeInActual
     *
     * @param \DateTime $timeInActual
     * @return OutOffice
     */
    public function setTimeInActual($timeInActual)
    {
        $this->timeInActual = $timeInActual;
    
        return $this;
    }

    /**
     * Get timeInActual
     *
     * @return \DateTime 
     */
    public function getTimeInActual()
    {
        return $this->timeInActual;
    }

    /**
     * Set employee
     *
     * @param \OutOffice\StoreBundle\Entity\Employee $employee
     * @return OutOffice
     */
    public function setEmployee(\OutOffice\StoreBundle\Entity\Employee $employee = null)
    {
        $this->employee = $employee;
    
        return $this;
    }

    /**
     * Get employee
     *
     * @return \OutOffice\StoreBundle\Entity\Employee 
     */
    public function getEmployee()
    {
        return $this->employee;
    }

    /**
     * Set purpose
     *
     * @param \OutOffice\StoreBundle\Entity\Purpose $purpose
     * @return OutOffice
     */
    public function setPurpose(\OutOffice\StoreBundle\Entity\Purpose $purpose = null)
    {
        $this->purpose = $purpose;
    
        return $this;
    }

    /**
     * Get purpose
     *
     * @return \OutOffice\StoreBundle\Entity\Purpose 
     */
    public function getPurpose()
    {
        return $this->purpose;
    }

    /**
     * Set details
     *
     * @param string $details
     * @return OutOffice
     */
    public function setDetails($details)
    {
        $this->details = $details;
    
        return $this;
    }

    /**
     * Get details
     *
     * @return string 
     */
    public function getDetails()
    {
        return $this->details;
    }
}