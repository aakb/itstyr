<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ThemeRepository")
 */
class Theme
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", mappedBy="themes")
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\System", mappedBy="theme")
     */
    private $systems;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Report", mappedBy="theme")
     */
    private $reports;


    public function __construct()
    {
        $this->systems = new ArrayCollection();
        $this->reports = new ArrayCollection();
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

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->addTheme($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
            $category->removeTheme($this);
        }

        return $this;
    }

    /**
     * @return Collection|System[]
     */
    public function getSystems(): Collection
    {
        return $this->systems;
    }

    public function addSystem(System $system): self
    {
        if (!$this->systems->contains($system)) {
            $this->systems[] = $system;
            $system->setTheme($this);
        }

        return $this;
    }

    public function removeSystem(System $system): self
    {
        if ($this->systems->contains($system)) {
            $this->systems->removeElement($system);
            // set the owning side to null (unless already changed)
            if ($system->getTheme() === $this) {
                $system->setTheme(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Report[]
     */
    public function getReports(): Collection
    {
        return $this->reports;
    }

    public function addReport(Report $report): self
    {
        if (!$this->reports->contains($report)) {
            $this->reports[] = $report;
            $report->setTheme($this);
        }

        return $this;
    }

    public function removeReport(Report $report): self
    {
        if ($this->reports->contains($report)) {
            $this->reports->removeElement($report);
            // set the owning side to null (unless already changed)
            if ($report->getTheme() === $this) {
                $report->setTheme(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getName() ?: $this->getId();
    }
}
