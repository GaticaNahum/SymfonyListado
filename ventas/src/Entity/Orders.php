<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="orders", indexes={@ORM\Index(name="orders_ibfk_1", columns={"customerNumber"})})
 * @ORM\Entity
 */
class Orders
{
    /**
     * @var int
     *
     * @ORM\Column(name="orderNumber", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ordernumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="orderDate", type="date", nullable=false)
     */
    private $orderdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="requiredDate", type="date", nullable=false)
     */
    private $requireddate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="shippedDate", type="date", nullable=true, options={"default"="NULL"})
     */
    private $shippeddate = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=15, nullable=false)
     */
    private $status;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comments", type="text", length=65535, nullable=true, options={"default"="NULL"})
     */
    private $comments = 'NULL';

    /**
     * @var \Customers
     *
     * @ORM\ManyToOne(targetEntity="Customers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customerNumber", referencedColumnName="customerNumber")
     * })
     */
    private $customernumber;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Products", inversedBy="ordernumber")
     * @ORM\JoinTable(name="orderdetails",
     *   joinColumns={
     *     @ORM\JoinColumn(name="orderNumber", referencedColumnName="orderNumber")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="productCode", referencedColumnName="productCode")
     *   }
     * )
     */
    private $productcode;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productcode = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
