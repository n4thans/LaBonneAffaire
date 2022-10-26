<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $Name = null;

    #[ORM\Column(length: 55)]
    private ?string $Firstname = null;

    #[ORM\Column(length: 12)]
    private ?string $Username = null;

    #[ORM\Column(length: 55)]
    private ?string $Password = null;

    #[ORM\Column(length: 55, nullable: true)]
    private ?string $Roles = null;

    #[ORM\Column(nullable: true)]
    private ?bool $Vote = null;

    #[ORM\Column(length: 255)]
    private ?string $Email = null;

    #[ORM\Column(nullable: true)]
    private ?int $Phonenumber = null;

    #[ORM\OneToMany(mappedBy: 'Seller', targetEntity: Product::class)]
    private Collection $ProductID;

    public function __construct()
    {
        $this->ProductID = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->Firstname;
    }

    public function setFirstname(string $Firstname): self
    {
        $this->Firstname = $Firstname;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->Username;
    }

    public function setUsername(string $Username): self
    {
        $this->Username = $Username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    public function getRoles(): ?string
    {
        return $this->Roles;
    }

    public function setRoles(?string $Roles): self
    {
        $this->Roles = $Roles;

        return $this;
    }

    public function isVote(): ?bool
    {
        return $this->Vote;
    }

    public function setVote(?bool $Vote): self
    {
        $this->Vote = $Vote;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getPhonenumber(): ?int
    {
        return $this->Phonenumber;
    }

    public function setPhonenumber(?int $Phonenumber): self
    {
        $this->Phonenumber = $Phonenumber;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProductID(): Collection
    {
        return $this->ProductID;
    }

    public function addProductID(Product $productID): self
    {
        if (!$this->ProductID->contains($productID)) {
            $this->ProductID->add($productID);
            $productID->setSeller($this);
        }

        return $this;
    }

    public function removeProductID(Product $productID): self
    {
        if ($this->ProductID->removeElement($productID)) {
            // set the owning side to null (unless already changed)
            if ($productID->getSeller() === $this) {
                $productID->setSeller(null);
            }
        }

        return $this;
    }
}
