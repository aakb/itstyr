<?php

namespace App\Entity;

use App\Traits\ArchivableEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SystemRepository")
 * @Gedmo\Loggable
 */
class System
{
    use BlameableEntity;
    use TimestampableEntity;
    use ArchivableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Gedmo\Versioned
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Gedmo\Versioned
     */
    private $text;

    /**
     * @ORM\Column(type="string", length=255)
     * @Gedmo\Versioned
     */
    protected $sysSystemOwner;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $sysId;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysTitle;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysAlternativeTitle;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $sysUpdated;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysDescription;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysOwner;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysOwnerSubdepartment;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysEmergencySetup;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysContractor;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysUrgencyRating;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysNumberOfUsers;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysTechnicalDocumentation;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysExternalDependencies;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysImportantInformation;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysSuperuserOrganization;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysServerNames;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysITSecurityCategory;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysLinkToSecurityReview;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysLinkToContract;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $sysEndOfContract;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysOpenData;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysOpenSource;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysDigitalPost;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysSystemCategory;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysDigitalTransactionsPrYear;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysTotalTransactionsPrYear;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysSelfServiceURL;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysVersion;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Answer", mappedBy="system")
     */
    private $answers;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sysOwnerSub;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sysLink;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sysInternalId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sysStatus;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\SelfServiceAvailableFromItem", mappedBy="systems")
     */
    private $selfServiceAvailableFromItems;

    /**
     * @ORM\Column(name="edoc_url", type="string", length=255, nullable=true)
     */
    private $eDocUrl;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Group", inversedBy="systems")
     */
    private $groups;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
        $this->selfServiceAvailableFromItems = new ArrayCollection();
        $this->groups = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSysId()
    {
        return $this->sysId;
    }

    /**
     * @param mixed $sysId
     */
    public function setSysId($sysId)
    {
        $this->sysId = $sysId;
    }

    /**
     * @return mixed
     */
    public function getSysTitle()
    {
        return $this->sysTitle;
    }

    /**
     * @param mixed $sysTitle
     */
    public function setSysTitle($sysTitle)
    {
        $this->sysTitle = $sysTitle;
    }

    /**
     * @return mixed
     */
    public function getSysUpdated()
    {
        return $this->sysUpdated;
    }

    /**
     * @param mixed $sysUpdated
     */
    public function setSysUpdated($sysUpdated)
    {
        $this->sysUpdated = $sysUpdated;
    }

    /**
     * @return mixed
     */
    public function getSysDescription()
    {
        return $this->sysDescription;
    }

    /**
     * @param mixed $sysDescription
     */
    public function setSysDescription($sysDescription)
    {
        $this->sysDescription = $sysDescription;
    }

    /**
     * @return mixed
     */
    public function getSysOwner()
    {
        return $this->sysOwner;
    }

    /**
     * @param mixed $sysOwner
     */
    public function setSysOwner($sysOwner)
    {
        $this->sysOwner = $sysOwner;
    }

    /**
     * @return mixed
     */
    public function getSysOwnerSubdepartment()
    {
        return $this->sysOwnerSubdepartment;
    }

    /**
     * @param mixed $sysOwnerSubdepartment
     */
    public function setSysOwnerSubdepartment($sysOwnerSubdepartment)
    {
        $this->sysOwnerSubdepartment = $sysOwnerSubdepartment;
    }

    /**
     * @return mixed
     */
    public function getSysEmergencySetup()
    {
        return $this->sysEmergencySetup;
    }

    /**
     * @param mixed $sysEmergencySetup
     */
    public function setSysEmergencySetup($sysEmergencySetup)
    {
        $this->sysEmergencySetup = $sysEmergencySetup;
    }

    /**
     * @return mixed
     */
    public function getSysContractor()
    {
        return $this->sysContractor;
    }

    /**
     * @param mixed $sysContractor
     */
    public function setSysContractor($sysContractor)
    {
        $this->sysContractor = $sysContractor;
    }

    /**
     * @return mixed
     */
    public function getSysUrgencyRating()
    {
        return $this->sysUrgencyRating;
    }

    /**
     * @param mixed $sysUrgencyRating
     */
    public function setSysUrgencyRating($sysUrgencyRating)
    {
        $this->sysUrgencyRating = $sysUrgencyRating;
    }

    /**
     * @return mixed
     */
    public function getSysNumberOfUsers()
    {
        return $this->sysNumberOfUsers;
    }

    /**
     * @param mixed $sysNumberOfUsers
     */
    public function setSysNumberOfUsers($sysNumberOfUsers)
    {
        $this->sysNumberOfUsers = $sysNumberOfUsers;
    }

    /**
     * @return mixed
     */
    public function getSysTechnicalDocumentation()
    {
        return $this->sysTechnicalDocumentation;
    }

    /**
     * @param mixed $sysTechnicalDocumentation
     */
    public function setSysTechnicalDocumentation($sysTechnicalDocumentation)
    {
        $this->sysTechnicalDocumentation = $sysTechnicalDocumentation;
    }

    /**
     * @return mixed
     */
    public function getSysExternalDependencies()
    {
        return $this->sysExternalDependencies;
    }

    /**
     * @param mixed $sysExternalDependencies
     */
    public function setSysExternalDependencies($sysExternalDependencies)
    {
        $this->sysExternalDependencies = $sysExternalDependencies;
    }

    /**
     * @return mixed
     */
    public function getSysImportantInformation()
    {
        return $this->sysImportantInformation;
    }

    /**
     * @param mixed $sysImportantInformation
     */
    public function setSysImportantInformation($sysImportantInformation)
    {
        $this->sysImportantInformation = $sysImportantInformation;
    }

    /**
     * @return mixed
     */
    public function getSysSuperuserOrganization()
    {
        return $this->sysSuperuserOrganization;
    }

    /**
     * @param mixed $sysSuperuserOrganization
     */
    public function setSysSuperuserOrganization($sysSuperuserOrganization)
    {
        $this->sysSuperuserOrganization = $sysSuperuserOrganization;
    }

    /**
     * @return mixed
     */
    public function getSysServerNames()
    {
        return $this->sysServerNames;
    }

    /**
     * @param mixed $sysServerNames
     */
    public function setSysServerNames($sysServerNames)
    {
        $this->sysServerNames = $sysServerNames;
    }

    /**
     * @return mixed
     */
    public function getSysITSecurityCategory()
    {
        return $this->sysITSecurityCategory;
    }

    /**
     * @param mixed $sysITSecurityCategory
     */
    public function setSysITSecurityCategory($sysITSecurityCategory)
    {
        $this->sysITSecurityCategory = $sysITSecurityCategory;
    }

    /**
     * @return mixed
     */
    public function getSysLinkToSecurityReview()
    {
        return $this->sysLinkToSecurityReview;
    }

    /**
     * @param mixed $sysLinkToSecurityReview
     */
    public function setSysLinkToSecurityReview($sysLinkToSecurityReview)
    {
        $this->sysLinkToSecurityReview = $sysLinkToSecurityReview;
    }

    /**
     * @return mixed
     */
    public function getSysLinkToContract()
    {
        return $this->sysLinkToContract;
    }

    /**
     * @param mixed $sysLinkToContract
     */
    public function setSysLinkToContract($sysLinkToContract)
    {
        $this->sysLinkToContract = $sysLinkToContract;
    }

    /**
     * @return mixed
     */
    public function getSysEndOfContract()
    {
        return $this->sysEndOfContract;
    }

    /**
     * @param mixed $sysEndOfContract
     */
    public function setSysEndOfContract($sysEndOfContract)
    {
        $this->sysEndOfContract = $sysEndOfContract;
    }

    /**
     * @return mixed
     */
    public function getSysOpenData()
    {
        return $this->sysOpenData;
    }

    /**
     * @param mixed $sysOpenData
     */
    public function setSysOpenData($sysOpenData)
    {
        $this->sysOpenData = $sysOpenData;
    }

    /**
     * @return mixed
     */
    public function getSysOpenSource()
    {
        return $this->sysOpenSource;
    }

    /**
     * @param mixed $sysOpenSource
     */
    public function setSysOpenSource($sysOpenSource)
    {
        $this->sysOpenSource = $sysOpenSource;
    }

    /**
     * @return mixed
     */
    public function getSysDigitalPost()
    {
        return $this->sysDigitalPost;
    }

    /**
     * @param mixed $sysDigitalPost
     */
    public function setSysDigitalPost($sysDigitalPost)
    {
        $this->sysDigitalPost = $sysDigitalPost;
    }

    /**
     * @return mixed
     */
    public function getSysSystemCategory()
    {
        return $this->sysSystemCategory;
    }

    /**
     * @param mixed $sysSystemCategory
     */
    public function setSysSystemCategory($sysSystemCategory)
    {
        $this->sysSystemCategory = $sysSystemCategory;
    }

    /**
     * @return mixed
     */
    public function getSysDigitalTransactionsPrYear()
    {
        return $this->sysDigitalTransactionsPrYear;
    }

    /**
     * @param mixed $sysDigitalTransactionsPrYear
     */
    public function setSysDigitalTransactionsPrYear(
      $sysDigitalTransactionsPrYear
    ) {
        $this->sysDigitalTransactionsPrYear = $sysDigitalTransactionsPrYear;
    }

    /**
     * @return mixed
     */
    public function getSysTotalTransactionsPrYear()
    {
        return $this->sysTotalTransactionsPrYear;
    }

    /**
     * @param mixed $sysTotalTransactionsPrYear
     */
    public function setSysTotalTransactionsPrYear($sysTotalTransactionsPrYear)
    {
        $this->sysTotalTransactionsPrYear = $sysTotalTransactionsPrYear;
    }

    /**
     * @return mixed
     */
    public function getSysSelfServiceURL()
    {
        return $this->sysSelfServiceURL;
    }

    /**
     * @param mixed $sysSelfServiceURL
     */
    public function setSysSelfServiceURL($sysSelfServiceURL)
    {
        $this->sysSelfServiceURL = $sysSelfServiceURL;
    }

    /**
     * @return mixed
     */
    public function getSysAlternativeTitle()
    {
        return $this->sysAlternativeTitle;
    }

    /**
     * @param mixed $sysAlternativeTitle
     */
    public function setSysAlternativeTitle($sysAlternativeTitle)
    {
        $this->sysAlternativeTitle = $sysAlternativeTitle;
    }

    /**
     * @return mixed
     */
    public function getSysVersion()
    {
        return $this->sysVersion;
    }

    /**
     * @param mixed $sysVersion
     */
    public function setSysVersion($sysVersion)
    {
        $this->sysVersion = $sysVersion;
    }

    /**
     * Virtual property.
     */
    public function getSysIdAsLink()
    {
        return $this->getSysId();
    }

    /**
     * Virtual property.
     */
    public function getShowableName()
    {
        return isset($this->sysTitle) ? $this->sysTitle : $this->getName();
    }

    /**
     * Virtual property.
     */
    public function getTextSet()
    {
        return isset($this->text);
    }

    /**
     * @return Collection|Answer[]
     */
    public function getAnswers(): Collection
    {
        return $this->answers;
    }

    public function addAnswer(Answer $answer): self
    {
        if (!$this->answers->contains($answer)) {
            $this->answers[] = $answer;
            $answer->setSystem($this);
        }

        return $this;
    }

    public function removeAnswer(Answer $answer): self
    {
        if ($this->answers->contains($answer)) {
            $this->answers->removeElement($answer);
            // set the owning side to null (unless already changed)
            if ($answer->getSystem() === $this) {
                $answer->setSystem(null);
            }
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSysSystemOwner()
    {
        return $this->sysSystemOwner;
    }

    /**
     * @param mixed $sysSystemOwner
     */
    public function setSysSystemOwner($sysSystemOwner): void
    {
        $this->sysSystemOwner = $sysSystemOwner;
    }

    /**
     * @return mixed
     */
    public function getSysOwnerSub()
    {
        return $this->sysOwnerSub;
    }

    /**
     * @param mixed $sysOwnerSub
     */
    public function setSysOwnerSub($sysOwnerSub): void
    {
        $this->sysOwnerSub = $sysOwnerSub;
    }

    /**
     * Virtual property.
     */
    public function getAnswerArea()
    {
        $themes = [];
        $groups = $this->getGroups();

        foreach ($groups as $group) {
            $themes = array_merge($themes, $group->getSystemThemes()->toArray());
        }

        return $themes;
    }

    public function getSysLink(): ?string
    {
        return $this->sysLink;
    }

    public function setSysLink(string $sysLink): self
    {
        $this->sysLink = $sysLink;

        return $this;
    }

    public function getSysInternalId(): ?int
    {
        return $this->sysInternalId;
    }

    public function setSysInternalId(?int $sysInternalId): self
    {
        $this->sysInternalId = $sysInternalId;

        return $this;
    }

    public function getSysStatus(): ?string
    {
        return $this->sysStatus;
    }

    public function setSysStatus(?string $sysStatus): self
    {
        $this->sysStatus = $sysStatus;

        return $this;
    }

    /**
     * @return Collection|SelfServiceAvailableFromItem[]
     */
    public function getSelfServiceAvailableFromItems(): Collection
    {
        return $this->selfServiceAvailableFromItems;
    }

    public function addSelfServiceAvailableFromItem(SelfServiceAvailableFromItem $selfServiceAvailableFromItem): self
    {
        if (!$this->selfServiceAvailableFromItems->contains($selfServiceAvailableFromItem)) {
            $this->selfServiceAvailableFromItems[] = $selfServiceAvailableFromItem;
            $selfServiceAvailableFromItem->addSystem($this);
        }

        return $this;
    }

    public function removeSelfServiceAvailableFromItem(SelfServiceAvailableFromItem $selfServiceAvailableFromItem): self
    {
        if ($this->selfServiceAvailableFromItems->contains($selfServiceAvailableFromItem)) {
            $this->selfServiceAvailableFromItems->removeElement($selfServiceAvailableFromItem);
            $selfServiceAvailableFromItem->removeSystem($this);
        }

        return $this;
    }

    public function clearSelfServiceAvailableFromItems(): self
    {
        while ($this->selfServiceAvailableFromItems->count() > 0) {
            $this->removeSelfServiceAvailableFromItem($this->selfServiceAvailableFromItems->first());
        }

        return $this;
    }

    public function getEDocUrl(): ?string
    {
        return $this->eDocUrl;
    }

    public function setEDocUrl(?string $eDocUrl): self
    {
        $this->eDocUrl = $eDocUrl;

        return $this;
    }

    /**
     * @return Collection|Group[]
     */
    public function getGroups(): Collection
    {
        return $this->groups;
    }

    public function addGroup(Group $group): self
    {
        if (!$this->groups->contains($group)) {
            $this->groups[] = $group;
        }

        return $this;
    }

    public function removeGroup(Group $group): self
    {
        if ($this->groups->contains($group)) {
            $this->groups->removeElement($group);
        }

        return $this;
    }

}
