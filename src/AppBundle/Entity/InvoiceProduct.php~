<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * InvoiceProduct
 *
 * @ORM\Table(name="invoice_product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InvoiceProductRepository")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class InvoiceProduct
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
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Invoice", inversedBy="invoiceproduct")
     * @ORM\JoinColumn(name="invoice",referencedColumnName="id")
     */
    private $invoice;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="productinvoice")
     * @ORM\JoinColumn(name="product",referencedColumnName="id")
     */
    private $product;

    /**
     * @var string
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;
    
    /**
     * @var string
     *
     * @ORM\Column(name="hsnno", type="string", length=255, nullable=true)
     */
    private $hsnno;
    
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
     * Set invoice
     *
     * @param integer $invoice
     *
     * @return InvoiceProduct
     */
    public function setinvoice($invoice)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * Get invoice
     *
     * @return int
     */
    public function getinvoice()
    {
        return $this->invoice;
    }

    /**
     * Set product
     *
     * @param integer $product
     *
     * @return InvoiceProduct
     */
    public function setproduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return int
     */
    public function getproduct()
    {
        return $this->product;
    }

    /**
     * Set quantity
     *
     * @param string $quantity
     *
     * @return InvoiceProduct
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return InvoiceProduct
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
     * Set hsnno
     *
     * @param string $hsnno
     *
     * @return InvoiceProduct
     */
    public function setHsnno($hsnno)
    {
        $this->hsnno = $hsnno;

        return $this;
    }

    /**
     * Get hsnno
     *
     * @return string
     */
    public function getHsnno()
    {
        return $this->hsnno;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return InvoiceProduct
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
     * @return InvoiceProduct
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
     * @return InvoiceProduct
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
}
