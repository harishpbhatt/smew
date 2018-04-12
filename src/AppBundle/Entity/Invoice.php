<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * Invoice
 *
 * @ORM\Table(name="invoice")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InvoiceRepository")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class Invoice
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	private $id;
	
	/**
	 * @var int
	 *
	 * @ORM\Column(name="manualid", type="integer")
	 */
	private $manualid;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
	 */
	private $deletedAt;
	
	public function __construct()
	{
		$this->invoiceproduct = new ArrayCollection();
	}

    /**
     * @var \date
     *
     * @ORM\Column(name="todaysDate", type="string", length=255)
     */
	private $todaysDate;
	
	/**
	 * @var int
	 *
	 * @ORM\Column(name="invoiceNo", type="string", length=255)
	 */
	private $invoiceNo;

    /**
     * @var \date
     *
     * @ORM\Column(name="invoiceDate", type="string", length=255)
     */
    private $invoiceDate;

    /**
     * @var int
     *
     * @ORM\Column(name="challanNo", type="string", length=255)
     */
    private $challanNo;

    /**
     * @var \date
     *
     * @ORM\Column(name="challanDate", type="string", length=255)
     */
    private $challanDate;
    
    /**
     * @var int
     *
     * @ORM\Column(name="poNo", type="string", length=255, nullable=true)
     */
    private $poNo;
    
    /**
     * @var \date
     *
     * @ORM\Column(name="poDate", type="string", length=255, nullable=true)
     */
    private $poDate;
    
    /**
     * @var int
     *
     * @ORM\Column(name="poNo2", type="string", length=255, nullable=true)
     */
    private $poNo2;
    
    /**
     * @var \date
     *
     * @ORM\Column(name="poDate2", type="string", length=255, nullable=true)
     */
    private $poDate2;
    
    /**
     * @var \date
     *
     * @ORM\Column(name="gstPercentage", type="string", length=255, nullable=true)
     */
    private $gstPercentage;
    
    /**
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="invoices")
     * @ORM\JoinColumn(name="company",referencedColumnName="id")
     */
    private $company;
    
    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="invoices")
     * @ORM\JoinColumn(name="client",referencedColumnName="id")
     */
    private $client;
    
    /**
     * @ORM\OneToMany(targetEntity="InvoiceProduct",mappedBy="invoice")
     */
    private $invoiceproduct;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set todaysDate
     *
     * @param \date $todaysDate
     *
     * @return Invoice
     */
    public function setTodaysDate($todaysDate)
    {
        $this->todaysDate = $todaysDate;

        return $this;
    }

    /**
     * Get todaysDate
     *
     * @return \date
     */
    public function getTodaysDate()
    {
        return $this->todaysDate;
    }

    /**
     * Set invoiceDate
     *
     * @param \date $invoiceDate
     *
     * @return Invoice
     */
    public function setInvoiceDate($invoiceDate)
    {
        $this->invoiceDate = $invoiceDate;

        return $this;
    }

    /**
     * Get invoiceDate
     *
     * @return \date
     */
    public function getInvoiceDate()
    {
        return $this->invoiceDate;
    }

    /**
     * Set challanNo
     *
     * @param integer $challanNo
     *
     * @return Invoice
     */
    public function setChallanNo($challanNo)
    {
        $this->challanNo = $challanNo;

        return $this;
    }

    /**
     * Get challanNo
     *
     * @return int
     */
    public function getChallanNo()
    {
        return $this->challanNo;
    }

    /**
     * Set challanDate
     *
     * @param \date $challanDate
     *
     * @return Invoice
     */
    public function setChallanDate($challanDate)
    {
        $this->challanDate = $challanDate;

        return $this;
    }

    /**
     * Get challanDate
     *
     * @return \date
     */
    public function getChallanDate()
    {
        return $this->challanDate;
    }
    
    /**
     * Set company
     *
     * @param integer $company
     *
     * @return Invoice
     */
    public function setCompany($company)
    {
    	$this->company = $company;
    	
    	return $this;
    }
    
    /**
     * Get company
     *
     * @return int
     */
    public function getCompany()
    {
    	return $this->company;
    }
    
    /**
     * Set client
     *
     * @param integer $client
     *
     * @return Invoice
     */
    public function setClient($client)
    {
    	$this->client = $client;
    	
    	return $this;
    }
    
    /**
     * Get client
     *
     * @return int
     */
    public function getClient()
    {
    	return $this->client;
    }

    /**
     * Add invoiceproduct
     *
     * @param \AppBundle\Entity\InvoiceProduct $invoiceproduct
     *
     * @return Invoice
     */
    public function addInvoiceproduct(\AppBundle\Entity\InvoiceProduct $invoiceproduct)
    {
        $this->invoiceproduct[] = $invoiceproduct;

        return $this;
    }

    /**
     * Remove invoiceproduct
     *
     * @param \AppBundle\Entity\InvoiceProduct $invoiceproduct
     */
    public function removeInvoiceproduct(\AppBundle\Entity\InvoiceProduct $invoiceproduct)
    {
        $this->invoiceproduct->removeElement($invoiceproduct);
    }

    /**
     * Get invoiceproduct
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInvoiceproduct()
    {
        return $this->invoiceproduct;
    }

    /**
     * Set invoiceNo
     *
     * @param string $invoiceNo
     *
     * @return Invoice
     */
    public function setInvoiceNo($invoiceNo)
    {
        $this->invoiceNo = $invoiceNo;

        return $this;
    }

    /**
     * Get invoiceNo
     *
     * @return string
     */
    public function getInvoiceNo()
    {
        return $this->invoiceNo;
    }

    /**
     * Set poNo
     *
     * @param string $poNo
     *
     * @return Invoice
     */
    public function setPoNo($poNo)
    {
        $this->poNo = $poNo;

        return $this;
    }

    /**
     * Get poNo
     *
     * @return string
     */
    public function getPoNo()
    {
        return $this->poNo;
    }

    /**
     * Set poDate
     *
     * @param string $poDate
     *
     * @return Invoice
     */
    public function setPoDate($poDate)
    {
        $this->poDate = $poDate;

        return $this;
    }

    /**
     * Get poDate
     *
     * @return string
     */
    public function getPoDate()
    {
        return $this->poDate;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return Invoice
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Set poNo2
     *
     * @param string $poNo2
     *
     * @return Invoice
     */
    public function setPoNo2($poNo2)
    {
        $this->poNo2 = $poNo2;

        return $this;
    }

    /**
     * Get poNo2
     *
     * @return string
     */
    public function getPoNo2()
    {
        return $this->poNo2;
    }

    /**
     * Set poDate2
     *
     * @param string $poDate2
     *
     * @return Invoice
     */
    public function setPoDate2($poDate2)
    {
        $this->poDate2 = $poDate2;

        return $this;
    }

    /**
     * Get poDate2
     *
     * @return string
     */
    public function getPoDate2()
    {
        return $this->poDate2;
    }

    /**
     * Set manualid
     *
     * @param integer $manualid
     *
     * @return Invoice
     */
    public function setManualid($manualid)
    {
        $this->manualid = $manualid;

        return $this;
    }

    /**
     * Get manualid
     *
     * @return integer
     */
    public function getManualid()
    {
        return $this->manualid;
    }

    /**
     * Set gstPercentage
     *
     * @param string $gstPercentage
     *
     * @return Invoice
     */
    public function setGstPercentage($gstPercentage)
    {
        $this->gstPercentage = $gstPercentage;

        return $this;
    }

    /**
     * Get gstPercentage
     *
     * @return string
     */
    public function getGstPercentage()
    {
        return $this->gstPercentage;
    }
}
