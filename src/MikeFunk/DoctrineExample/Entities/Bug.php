<?php
/**
 * bug entity
 *
 * @package DoctrineExample
 * @license MIT License <http://opensource.org/licenses/mit-license.html>
 */
namespace MikeFunk\DoctrineExample\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use MikeFunk\DoctrineExample\Entities\Product;
use MikeFunk\DoctrineExample\Entities\User;

/**
 * Bug
 *
 * @author Michael Funk <mike@mikefunk.com>
 */
class Bug
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var string OPEN|CLOSED
     */
    private $status;

    /**
     * @var string
     */
    private $description;

    /**
     * reporter user
     *
     * @var User
     */
    protected $reporter;

    /**
     * engineer user
     *
     * @var User
     */
    protected $engineer;

    /**
     * product relation
     *
     * @var ArrayCollection (default: null)
     */
    protected $products = null;

    /**
     * dependency injection
     *
     * @return void
     */
    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    /**
     * close a bug
     *
     * @return void
     */
    public function close()
    {
        $this->status = 'CLOSED';
    }

    /**
     * assign bug to a product
     *
     * alias to addProduct()
     *
     * @param Product $product
     * @return Bug
     */
    public function assignToProduct(Product $product)
    {
        return $this->addProduct($product);
    }

    /**
     * getter
     *
     * @return ArrayCollection|null
     */
    // public function getProducts()
    // {
        // return $this->products;
    // }

    /**
     * setter
     *
     * @param User $engineer
     * @return void
     */
    public function setEngineer($engineer)
    {
        $engineer->assignedToBug($this);
        $this->engineer = $engineer;
    }

    /**
     * getter
     *
     * @return User
     */
    public function getEngineer()
    {
        return $this->engineer;
    }

    /**
     * getter
     *
     * @return User
     */
    public function getReporter()
    {
        return $this->reporter;
    }

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
     * Set created
     *
     * @param \DateTime $created
     * @return Bug
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Bug
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Bug
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

    /**
     * Set reporter
     *
     * @param User $reporter
     * @return Bug
     */
    public function setReporter(User $reporter = null)
    {
        $this->reporter = $reporter;

        return $this;
    }

    /**
     * Add products
     *
     * @param Product $products
     * @return Bug
     */
    public function addProduct(Product $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param Product $products
     */
    public function removeProduct(Product $products)
    {
        $this->products->removeElement($products);
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
}
