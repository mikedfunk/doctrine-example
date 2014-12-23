<?php

namespace MikeFunk\DoctrineExample\Entities;

use Doctrine\ORM\Mapping as ORM;

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
     * @var ArrayCollection
     */
    protected $reportedBugs;

    /**
     * assigned bugs
     *
     * @var ArrayCollection
     */
    protected $ArrayCollection;

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
