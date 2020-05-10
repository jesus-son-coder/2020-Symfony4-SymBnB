<?php

namespace App\Entity;

use App\Repository\AdRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Self_;

/**
 * @ORM\Entity(repositoryClass=AdRepository::class)
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


}
