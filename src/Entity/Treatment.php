<?php

namespace App\Entity;


use App\Repository\TreatmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Attribute\Groups;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Delete;




#[ORM\Entity(repositoryClass: TreatmentRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read']],
    denormalizationContext: ['groups' => ['write']],
    forceEager: false,
    operations: [
        new GetCollection(security: "is_granted('ROLE_VETERINARIAN')", securityMessage: 'You are not allowed to get treatments'),
        new Post(security: "is_granted('ROLE_VETERINARIAN')", securityMessage: 'You are not allowed to create this treatment'),
        new Get(security: "is_granted('ROLE_VETERINARIAN')", securityMessage: 'You are not allowed to get this treatment'),
        new Patch(security: "is_granted('ROLE_VETERINARIAN')", securityMessage: 'You are not allowed to edit this treatment'),
        new Delete(security: "is_granted('ROLE_VETERINARIAN')", securityMessage: 'You are not allowed to delete this treatment'),
    ]
)]
class Treatment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read', 'write'])]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['read', 'write'])]
    private ?string $description = null;


    #[ORM\Column(length: 255)]
    #[Groups(['read', 'write'])]
    private ?string $duration = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    #[Groups(['read', 'write'])]
    private ?string $price = null;

    /**
     * @var Collection<int, Consultation>
     */
    #[ORM\ManyToMany(targetEntity: Consultation::class, mappedBy: 'treatments')]
    #[Groups(['read', 'write'])]
    private Collection $consultations;


    public function __construct()
    {
        $this->consultations = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }


    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection<int, Consultation>
     */
    public function getConsultations(): Collection
    {
        return $this->consultations;
    }

    public function addConsultation(Consultation $consultation): static
    {
        if (!$this->consultations->contains($consultation)) {
            $this->consultations->add($consultation);
            $consultation->addTreatment($this);
        }

        return $this;
    }

    public function removeConsultation(Consultation $consultation): static
    {
        if ($this->consultations->removeElement($consultation)) {
            $consultation->removeTreatment($this);
        }

        return $this;
    }

}
