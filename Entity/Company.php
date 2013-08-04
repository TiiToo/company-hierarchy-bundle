<?php
namespace Skonsoft\CompanyHierarchyBundle\Entity;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * Company
 *
 * @ORM\Table(name="ss_company_hierarchy__company")
 * @ORM\Entity(repositoryClass="Skonsoft\CompanyHierarchyBundle\Entity\CompanyRepository")
 */
class Company
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=20, nullable=false)
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="vat_number", type="string", length=20, nullable=true)
     */
    private $vatNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Skonsoft\CompanyHierarchyBundle\Entity\Entity", mappedBy="company", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $entities;

    /**
     * @var \Skonsoft\PostalAddressBundle\Entity\Address
     *
     * @ORM\OneToOne(targetEntity="Skonsoft\PostalAddressBundle\Entity\Address")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id", nullable=true)
     */
    private $address;

    public function __construct()
    {
        $this->entities = new ArrayCollection();
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
     * @return Company
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
     * @return Company
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
     * @return Company
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
     * Set website
     *
     * @param string $website
     *
     * @return Company
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set vatNumber
     *
     * @param string $vatNumber
     *
     * @return Company
     */
    public function setVatNumber($vatNumber)
    {
        $this->vatNumber = $vatNumber;

        return $this;
    }

    /**
     * Get vatNumber
     *
     * @return string
     */
    public function getVatNumber()
    {
        return $this->vatNumber;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Company
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
     * Set entities
     *
     * @param \Doctrine\Common\Collections\ArrayCollection\ArrayCollection $entities
     *
     * @return \Skonsoft\CompanyHierarchyBundle\Entity\Company
     */
    public function setEntities(ArrayCollection $entities)
    {
        $this->entities = $entities;

        return $this;
    }

    /**
     * Get entities
     *
     * @return ArrayCollection
     */
    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * @param \Skonsoft\CompanyHierarchyBundle\Entity\Entity $entity
     *
     * @return \Skonsoft\CompanyHierarchyBundle\Entity\Company
     */
    public function addEntity(Entity $entity)
    {
        $entity->setCompany($this);
        $this->entities->add($entity);

        return $this;
    }

    /**
     * @param \Skonsoft\CompanyHierarchyBundle\Entity\Entity $entity
     *
     * @return \Skonsoft\CompanyHierarchyBundle\Entity\Company
     */
    public function removeState(State $entity)
    {
        $this->entities->removeElement($entity);
        unset($entity);

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
