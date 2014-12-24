<?php
/**
 * Bug repository
 *
 * @package AutoClassifiedsPlatform
 * @copyright 2014 Internet Brands, Inc. All Rights Reserved.
 */
namespace MikeFunk\DoctrineExample\Repositories;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Util\Debug;

/**
 * BugRepository
 *
 * @author Michael Funk <mike.funk@internetbrands.com>
 */
class BugRepository extends EntityRepository
{

    /**
     * get recent bugs with a limit
     *
     * @param int $limit (default: 30)
     * @return EntityManager
     */
    public function getRecentBugs($limit = 30)
    {
        // get the query result with a max
        return $this->getRecentBugsQuery($limit)->getResult();

        // this is how you var_dump a value because EntityManager is a beast.
        // I tried it anyway and got 3000+ lines in about 100 miliseconds.
        // Debug::dump($return); exit;
    }

    /**
     * get recent bugs in array format
     *
     * @param int $limit (default: 30)
     * @return array|null
     */
    public function getRecentBugsArray($limit = 30)
    {
        // get the query result with a max
        return $this->getRecentBugsQuery($limit)->getArrayResult();
    }

    /**
     * get query for recent bugs
     *
     * @param int $limit
     * @return \Doctrine\ORM\Query
     */
    protected function getRecentBugsQuery($limit)
    {
        // get the query with a max
        $dql = "SELECT b, e, r FROM MikeFunk\DoctrineExample\Entities\Bug b "
            . "JOIN b.engineer e JOIN b.reporter r ORDER BY b.created DESC";
        return $this->getEntityManager()->createQuery($dql)
            ->setMaxResults($limit);
    }

    /**
     * get bugs by user with optional limit
     *
     * @param int $userId
     * @param int $limit (default: 15)
     * @return EntityManager|null
     */
    public function getBugsByUser($userId, $limit = 15)
    {
        // get the query result and set the bound parameter
        $dql = "SELECT b, e, r FROM Bug b JOIN b.engineer e JOIN b.reporter r "
            . "WHERE b.status = 'OPEN' AND e.id = ?1 OR r.id = ?1 ORDER BY "
            . "b.created DESC";
        return $this->getEntityManager()->createQuery($dql)
            ->setParameter(1, $userId)->setMaxResults($limit)->getResult();
    }

    /**
     * get count (<-- scalar) of open bugs for each product
     *
     * @return array
     */
    public function getOpenBugCountForEachProduct()
    {
        // needs a scalar result because of the count aggregate function
        $dql = "SELECT p.id, p.name, count(b.id) AS openBugs FROM Bug b JOIN "
            . "b.products p WHERE b.status = 'OPEN' GROUP BY p.id";
        return $this->getEntityManager()->createQuery($dql)->getScalarResult();
    }
}
