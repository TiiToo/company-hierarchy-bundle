<?php
namespace Skonsoft\CompanyHierarchyBundle\Entity;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * Entity Define an entity or departement inside a Company
 *
 * @ORM\Table(name="ss_company_hierarchy__entity")
 * @ORM\Entity(repositoryClass="Skonsoft\CompanyHierarchyBundle\Entity\EntityRepository")
 */
class Entity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=20)
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var Company
     *
     * @ORM\ManyToOne(targetEntity="Skonsoft\CompanyHierarchyBundle\Entity\Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=false)
     */
    private $company;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Skonsoft\CompanyHierarchyBundle\Entity\Employee", mappedBy="entity", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $employees;

    /**
     * @var \Skonsoft\PostalAddressBundle\Entity\Address
     *
     * @ORM\OneToOne(targetEntity="Skonsoft\PostalAddressBundle\Entity\Address")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id", nullable=true)
     */
    private $address;

    public function __construct()
    {
        $this->employees = new ArrayCollection();
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
     *
     * @return Entity
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
     * Set description
     *
     * @param string $description
     *
     * @return Entity
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
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return Entity
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Entity
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return \Skonsoft\CompanyHierarchyBundle\Entity\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param \Skonsoft\CompanyHierarchyBundle\Entity\Company $company
     *
     * @return \Skonsoft\CompanyHierarchyBundle\Entity\Entity
     */
    public function setCompany(Company $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Set employees
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $employees
     *
     * @return \Skonsoft\CompanyHierarchyBundle\Entity\Entity
     */
    public function setEmployees(ArrayCollection $employees)
    {
        $this->employees = $employees;

        return $this;
    }

    /**
     * Get employees
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getEmployees()
    {
        return $this->employees;
    }

    /**
     * @param Employee $employee
     *
     * @return \Skonsoft\CompanyHierarchyBundle\Entity\Entity
     */
    public function addEmployee(Employee $employee)
    {
        $employee->setEntity($this);
        $this->employees->add($employee);

        return $this;
    }

    /**
     * @param Employee $employee
     *
     * @return \Skonsoft\CompanyHierarchyBundle\Entity\Entity
     */
    public function removeEmployee(Employee $employee)
    {
        $this->employees->removeElement($employee);
        unset($employee);

        return $this;
    }

    /**
     * @return \Skonsoft\PostalAddressBundle\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param \Skonsoft\PostalAddressBundle\Entity\Address $address
     *
     * @return \Skonsoft\CompanyHierarchyBundle\Entity\Company
     */
    public function setAddress(\Skonsoft\PostalAddressBundle\Entity\Address $address)
    {
        $this->address = $address;

        return $this;
    }

}
