<?php

namespace MikeFunk\DoctrineExample\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 */
class User
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * reported bugs
     *
     * @var ArrayCollection (default: null)
     */
    protected $reportedBugs = null;

    /**
     * assigned bugs
     *
     * @var ArrayCollection (default: null)
     */
    protected $assignedBugs = null;

    /**
     * dependency assignment
     *
     * @return void
     */
    public function __construct()
    {
        $this->reportedBugs = new ArrayCollection();
        $this->assignedBugs = new ArrayCollection();
    }

    /**
     * add reported bug for this user
     *
     * @param Bug $bug
     * @return void
     */
    public function addReportedBug(Bug $bug)
    {
        $this->reportedBugs[] = $bug;
    }

    /**
     * add to bugs assigned to this user
     *
     * @param Bug $bug
     * @return void
     */
    public function assignedToBug(Bug $bug)
    {
        $this->assignedBugs[] = $bug;
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
     * Set name
     *
     * @param string $name
     * @return User
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
}
