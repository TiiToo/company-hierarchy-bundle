<?php
namespace Skonsoft\CompanyHierarchyBundle\Model;

use Skonsoft\CompanyHierarchyBundle\Entity\Company;

/**
 * BusinessServiceProviderInterface
 *
 * This interface should be implemented once by the class that provides a services for companies.
 *
 * @author Skander MABROUK <mabroukskander@gmail.com>
 */
interface BusinessServiceProviderInterface
{
    /**
     * @return \Skonsoft\CompanyHierarchyBundle\Entity\Company
     */
    public function getCompany();

    /**
     * @param \Skonsoft\CompanyHierarchyBundle\Entity\Company $company
     *
     * @return BusinessServiceProviderInterface
     */
    public function setCompany(Company $company);
}
