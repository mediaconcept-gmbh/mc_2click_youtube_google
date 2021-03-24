<?php
namespace MC\McCookie\Domain\Repository;


/***
 *
 * This file is part of the "Cookie" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2021 Rafael Gonzalez Albes <albes@mediaconcept-ulm.de>, mediaconcept GmbH
 *           Stefan Hausladen <hausladen@mediaconcept-ulm.de>, mediaconcept GmbH
 *
 ***/
/**
 * The repository for Cookies
 */
class CookieRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @var array
     */
    protected $defaultOrderings = ['sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING];

    /**
     * @param $pid
     * @param $sysLanguage
     */
    public function findCurrent($pid, $sysLanguage)
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->getQuerySettings()->setRespectSysLanguage(FALSE);
        $constraints = [];
        $constraints[] = $query->equals('pid', $pid);
        $constraints[] = $query->equals('sys_language_uid', $sysLanguage);
        $query->matching($query->logicalAnd($constraints));
        return $query->execute()->getFirst();
    }
}
