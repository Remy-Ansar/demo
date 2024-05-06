<?php

namespace App\Entity;

use App\Entity\Traits\DateTimeTrait;
use App\Entity\Traits\EnableTrait;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CategorieRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


#[ORM\Entity(repositoryClass: CategorieRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Categorie
{
    use DateTimeTrait;
    use EnableTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[UniqueEntity(fields: ['name'], message: 'Ce nom est déjà utilisé pour une autre catégorie')]
    private ?string $name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function isEnable(): ?bool
    {
        return $this->enable;
    }

    public function setEnable(?bool $enable): static
    {
        $this->enable = $enable;

        return $this;
    }
}
