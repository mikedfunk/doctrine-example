<?php
/**
 * user entity
 *
 * @package DoctrineExample
 * @license MIT License <http://opensource.org/licenses/mit-license.html>
 */
namespace MikeFunk\DoctrineExample\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 *
 * @author Michael Funk <mike@mikefunk.com>
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

    /**
     * Remove reportedBugs
     *
     * @param \MikeFunk\DoctrineExample\Entities\Bug $reportedBugs
     */
    public function removeReportedBug(\MikeFunk\DoctrineExample\Entities\Bug $reportedBugs)
    {
        $this->reportedBugs->removeElement($reportedBugs);
    }

    /**
     * Get reportedBugs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReportedBugs()
    {
        return $this->reportedBugs;
    }

    /**
     * Add assignedBugs
     *
     * @param \MikeFunk\DoctrineExample\Entities\Bug $assignedBugs
     * @return User
     */
    public function addAssignedBug(\MikeFunk\DoctrineExample\Entities\Bug $assignedBugs)
    {
        $this->assignedBugs[] = $assignedBugs;

        return $this;
    }

    /**
     * Remove assignedBugs
     *
     * @param \MikeFunk\DoctrineExample\Entities\Bug $assignedBugs
     */
    public function removeAssignedBug(\MikeFunk\DoctrineExample\Entities\Bug $assignedBugs)
    {
        $this->assignedBugs->removeElement($assignedBugs);
    }

    /**
     * Get assignedBugs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAssignedBugs()
    {
        return $this->assignedBugs;
    }
}
