<?php

namespace App\Entity;

use App\Repository\HomePageRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;


#[ORM\Entity(repositoryClass: HomePageRepository::class)]
class HomePage
{
#[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $pageTitle = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $welcomeText = null;

    #[ORM\Column(length: 255)]
    private ?string $aboutTitle = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $aboutText = null;

    #[ORM\Column(length: 255)]
    private ?string $sectionDishesTitle = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $sectionDishesText = null;

    #[ORM\OneToMany(mappedBy: 'HomePage', targetEntity: FamousDishes::class)]
    private Collection $famousDishes;

    public function __construct()
    {
        $this->famousDishes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPageTitle(): ?string
    {
        return $this->pageTitle;
    }

    public function setPageTitle(string $pageTitle): self
    {
        $this->pageTitle = $pageTitle;

        return $this;
    }

    public function getWelcomeText(): ?string
    {
        return $this->welcomeText;
    }

    public function setWelcomeText(string $welcomeText): self
    {
        $this->welcomeText = $welcomeText;

        return $this;
    }

    public function getAboutTitle(): ?string
    {
        return $this->aboutTitle;
    }

    public function setAboutTitle(string $aboutTitle): self
    {
        $this->aboutTitle = $aboutTitle;

        return $this;
    }

    public function getaboutText(): ?string
    {
        return $this->aboutText;
    }

    public function setAboutText(string $aboutText): self
    {
        $this->aboutText = $aboutText;

        return $this;
    }

    public function getSectionDishesTitle(): ?string
    {
        return $this->sectionDishesTitle;
    }

    public function setSectionDishesTitle(string $sectionDishesTitle): self
    {
        $this->sectionDishesTitle = $sectionDishesTitle;

        return $this;
    }

    public function getSectionDishesText(): ?string
    {
        return $this->sectionDishesText;
    }

    public function setSectionDishesText(string $sectionDishesText): self
    {
        $this->sectionDishesText = $sectionDishesText;

        return $this;
    }

    /**
     * @return Collection<int, FamousDishes>
     */
    public function getFamousDishes(): Collection
    {
        return $this->famousDishes;
    }

    public function addFamousDishes(FamousDishes $famousDishes): self
    {
        if (!$this->famousDishes->contains($famousDishes)) {
            $this->famousDishes->add($famousDishes);
            $famousDishes->setHomePage($this);
        }

        return $this;
    }

    public function removeFamousDishes(FamousDishes $famousDishes): self
    {
        if ($this->famousDishes->removeElement($famousDishes)) {
            // set the owning side to null (unless already changed)
            if ($famousDishes->getHomePage() === $this) {
                $famousDishes->setHomePage(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getPageTitle();
    }
}

