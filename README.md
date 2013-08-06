company-hierarchy-bundle
========================

Company hierarchy management bundle for Symfony2

This bundle includes basic hierarchy for companies. Each company has an entities (production, administration, HR, ...) And for each entity, a list of employees are attached.
For advanced configuration, this bundle includes a list of "Business service providers", that means, each company can has one or more business service providers. E.g, A company can be a customer of another company called business, so the "business" provides a sevices to company.
That's why you should create a new class that implements BusinessServiceProviderInterface. To get more détails, refer to docrine documentation: That's why you should create a new class that implements BusinessServiceProviderInterface. To get more détails, refer to symfony documentation:  http://symfony.com/doc/current/cookbook/doctrine/resolve_target_entity.html

If you need only basic configuration, you should use the 1.0 version.


### Step 1: Install bundle using composer for master version.
``` js
{
    "require": {
        // ...
        "skonsoft/company-hierarchy-bundle": "dev-master"
    }
}
```

### Step 2: Register the bundle

```
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Skonsoft\CompanyHierarchyBundle\SkonsoftCompanyHierarchyBundle(),
    );
    // ...
}
```
### Step 3: Create your custom BusinessServiceProvider

BusinessServiceProvider usually used on B2B logic, in your application, you have a list of Business (company or client) That provides a busess services to their customers (companies).

This is just an example of how to create your BusinessServiceProvider

```
<?php
namespace Skonsoft\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Skonsoft\CompanyHierarchyBundle\Model\BusinessServiceProviderInterface,
    Skonsoft\CompanyHierarchyBundle\Entity\Company;

/**
 * Description of BusinessCustomer
 *
 * @ORM\Table(name="ss_user__business_customer")
 * @ORM\Entity
 *
 */
class BusinessCustomer implements BusinessServiceProviderInterface
{
    /**
     * This attribute refrences your real Business class. You should has class named Business.
     * By logic, A Business, is the direct client of your application.
     * So, a Business will provide a services to a company (B2B logic business).
     *
     * @var Skonsoft\UserBundle\Entity\Business
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Skonsoft\UserBundle\Entity\Business")
     * @ORM\JoinColumn(name="business_id", referencedColumnName="id", nullable=false)
     */
    private $business;

    /**
     * @var Skonsoft\CompanyHierarchyBundle\Entity\Company
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Skonsoft\CompanyHierarchyBundle\Entity\Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=false)
     */
    private $company;

    /**
     * @return Business
     */
    public function getBusiness()
    {
        return $this->business;
    }

    /**
     * @param \Skonsoft\UserBundle\Entity\Business $business
     *
     * @return \Skonsoft\UserBundle\Entity\BusinessCustomer
     */
    public function setBusiness(Business $business)
    {
        $this->business = $business;

        return $this;
    }

    /**
     *
     * @return \Skonsoft\CompanyHierarchyBundle\Entity\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @see BusinessServiceProviderInterface
     *
     * @param \Skonsoft\CompanyHierarchyBundle\Entity\Company $company
     *
     * @return \Skonsoft\UserBundle\Entity\BusinessCustomer
     */
    public function setCompany(Company $company)
    {
        $this->company = $company;

        return $this;
    }

}

```

### Step 4: Update your schema database
```
#Important: don't use this command in production environnement !

./app/console doctrine:schema:update --force

```

### Step 5: Find an issue ?

please create a ticket.
