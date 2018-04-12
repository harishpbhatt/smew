<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class Product
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
	 * @ORM\ManyToOne(targetEntity="Client", inversedBy="products")
	 * @ORM\JoinColumn(name="client",referencedColumnName="id")
	 */
	private $client;
	
	/**
	 * @ORM\OneToMany(targetEntity="InvoiceProduct",mappedBy="product")
	 */
	private $productinvoice;
	
	public function __construct()
	{
		$this->productinvoice = new ArrayCollection();
	}

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="drawingcode", type="string", length=255, nullable=true)
     */
    private $drawingcode;

    /**
     * @var float
     *
     * @ORM\Column(name="unitprice", type="float")
     */
    private $unitprice;


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
     * Set name
     *
     * @param string $name
     *
     * @return Product
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
     * Set drawingcode
     *
     * @param string $drawingcode
     *
     * @return Product
     */
    public function setDrawingcode($drawingcode)
    {
        $this->drawingcode = $drawingcode;

        return $this;
    }

    /**
     * Get drawingcode
     *
     * @return string
     */
    public function getDrawingcode()
    {
        return $this->drawingcode;
    }

    /**
     * Set unitprice
     *
     * @param float $unitprice
     *
     * @return Product
     */
    public function setUnitprice($unitprice)
    {
        $this->unitprice = $unitprice;

        return $this;
    }

    /**
     * Get unitprice
     *
     * @return float
     */
    public function getUnitprice()
    {
        return $this->unitprice;
    }

    /**
     * Add productinvoice
     *
     * @param \AppBundle\Entity\InvoiceProduct $productinvoice
     *
     * @return Product
     */
    public function addProductinvoice(\AppBundle\Entity\InvoiceProduct $productinvoice)
    {
        $this->productinvoice[] = $productinvoice;

        return $this;
    }

    /**
     * Remove productinvoice
     *
     * @param \AppBundle\Entity\InvoiceProduct $productinvoice
     */
    public function removeProductinvoice(\AppBundle\Entity\InvoiceProduct $productinvoice)
    {
        $this->productinvoice->removeElement($productinvoice);
    }

    /**
     * Get productinvoice
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductinvoice()
    {
        return $this->productinvoice;
    }
    
    /**
     * Set client
     *
     * @param integer $client
     *
     * @return Client
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
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return Product
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
     * Set deleted
     *
     * @param integer $deleted
     *
     * @return Product
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return integer
     */
    public function getDeleted()
    {
        return $this->deleted;
    }
}
