<?php

namespace App\Entity;

use App\Repository\AdRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Ad
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
  private $title;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $slug;

  /**
   * @ORM\Column(type="float")
   */
  private $price;

  /**
   * @ORM\Column(type="text")
   */
  private $introduction;

  /**
   * @ORM\Column(type="text")
   */
  private $content;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $coverImage;

  /**
   * @ORM\Column(type="integer")
   */
  private $rooms;

  /**
   * @ORM\OneToMany(targetEntity=Image::class, mappedBy="ad", orphanRemoval=true)
   */
  private $images;

  public function __construct()
  {
      $this->images = new ArrayCollection();
  }

  /**
   * Permet d'initialiser le slug
   *
   * @ORM\PrePersist()
   * @ORM\PreUpdate()
   */
  public function initializeSlug()
  {
    if(empty($this->slug)) {
      $slugify = new Slugify();
      $this->slug = $slugify->slugify($this->getTitle());
    }
  }


  public function getId(): ?int
  {
    return $this->id;
  }

  public function getTitle(): ?string
  {
    return $this->title;
  }

  public function setTitle(string $title): self
  {
    $this->title = $title;

    return $this;
  }

  /**
   * @return mixed
   */
  public function getSlug()
  {
    return $this->slug;
  }


  public function setSlug($slug): self
  {
    $this->slug = $slug;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getPrice()
  {
    return $this->price;
  }


  public function setPrice($price): self
  {
    $this->price = $price;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getIntroduction()
  {
    return $this->introduction;
  }


  public function setIntroduction($introduction): self
  {
    $this->introduction = $introduction;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getContent()
  {
    return $this->content;
  }


  public function setContent($content): self
  {
    $this->content = $content;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getCoverImage()
  {
    return $this->coverImage;
  }


  public function setCoverImage($coverImage): self
  {
    $this->coverImage = $coverImage;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getRooms()
  {
    return $this->rooms;
  }


  public function setRooms($rooms): self
  {
    $this->rooms = $rooms;
    return $this;
  }

  /**
   * @return Collection|Image[]
   */
  public function getImages(): Collection
  {
      return $this->images;
  }

  public function addImage(Image $image): self
  {
      if (!$this->images->contains($image)) {
          $this->images[] = $image;
          $image->setAd($this);
      }

      return $this;
  }

  public function removeImage(Image $image): self
  {
      if ($this->images->contains($image)) {
          $this->images->removeElement($image);
          // set the owning side to null (unless already changed)
          if ($image->getAd() === $this) {
              $image->setAd(null);
          }
      }

      return $this;
  }


}
