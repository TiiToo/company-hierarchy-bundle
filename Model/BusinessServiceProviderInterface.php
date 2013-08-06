<?php
namespace Skonsoft\CompanyHierarchyBundle\Model;

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
     * @return string
     */
    public function getName();
}
