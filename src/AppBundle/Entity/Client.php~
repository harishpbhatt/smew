<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClientRepository")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class Client
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
	 * @var \DateTime
	 *
	 * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
	 */
	private $deletedAt;
	
	/**
	 * @ORM\OneToMany(targetEntity="Product",mappedBy="client")
	 */
	private $products;	
	
	/**
	 * @ORM\ManyToOne(targetEntity="Company", inversedBy="clients")
	 * @ORM\JoinColumn(name="company",referencedColumnName="id")
	 */
	private $company;
	
	/**
	 * @ORM\OneToMany(targetEntity="Invoice",mappedBy="client")
	 */
	private $invoices;
	
	public function __construct()
	{
		$this->invoices= new ArrayCollection();
		$this->products= new ArrayCollection();
	}

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
	private $title;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="gstno", type="string", length=255)
	 */
	private $gstno;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255)
     */
    private $state;

    /**
     * @var int
     *
     * @ORM\Column(name="pincode", type="integer")
     */
    private $pincode;


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
     * Set title
     *
     * @param string $title
     *
     * @return Client
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set street
     *
     * @param string $street
     *
     * @return Client
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Client
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return Client
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set pincode
     *
     * @param integer $pincode
     *
     * @return Client
     */
    public function setPincode($pincode)
    {
        $this->pincode = $pincode;

        return $this;
    }

    /**
     * Get pincode
     *
     * @return int
     */
    public function getPincode()
    {
        return $this->pincode;
    }

    /**
     * Add invoice
     *
     * @param \AppBundle\Entity\Invoice $invoice
     *
     * @return Client
     */
    public function addInvoice(\AppBundle\Entity\Invoice $invoice)
    {
        $this->invoices[] = $invoice;

        return $this;
    }

    /**
     * Remove invoice
     *
     * @param \AppBundle\Entity\Invoice $invoice
     */
    public function removeInvoice(\AppBundle\Entity\Invoice $invoice)
    {
        $this->invoices->removeElement($invoice);
    }

    /**
     * Get invoices
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInvoices()
    {
        return $this->invoices;
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
     * Add product
     *
     * @param \AppBundle\Entity\Product $product
     *
     * @return Product
     */
    public function addProduct(\AppBundle\Entity\Product $product)
    {
    	$this->products[] = $product;
    	
    	return $this;
    }
    
    /**
     * Remove product
     *
     * @param \AppBundle\Entity\Product $product
     */
    public function removeProduct(\AppBundle\Entity\Product $product)
    {
    	$this->products->removeElement($product);
    }
    
    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
    	return $this->products;
    }

    /**
     * Set gstno
     *
     * @param string $gstno
     *
     * @return Client
     */
    public function setGstno($gstno)
    {
        $this->gstno = $gstno;

        return $this;
    }

    /**
     * Get gstno
     *
     * @return string
     */
    public function getGstno()
    {
        return $this->gstno;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return Client
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
}
