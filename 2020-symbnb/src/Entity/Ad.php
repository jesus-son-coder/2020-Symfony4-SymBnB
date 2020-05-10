<?php

namespace App\Entity;

use App\Repository\AdRepository;
use Doctrine\ORM\Mapping as ORM;

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

  /**
   * @param mixed $slug
   */
  public function setSlug($slug): void
  {
    $this->slug = $slug;
  }

  /**
   * @return mixed
   */
  public function getPrice()
  {
    return $this->price;
  }

  /**
   * @param mixed $price
   */
  public function setPrice($price): void
  {
    $this->price = $price;
  }

  /**
   * @return mixed
   */
  public function getIntroduction()
  {
    return $this->introduction;
  }

  /**
   * @param mixed $introduction
   */
  public function setIntroduction($introduction): void
  {
    $this->introduction = $introduction;
  }

  /**
   * @return mixed
   */
  public function getContent()
  {
    return $this->content;
  }

  /**
   * @param mixed $content
   */
  public function setContent($content): void
  {
    $this->content = $content;
  }

  /**
   * @return mixed
   */
  public function getCoverImage()
  {
    return $this->coverImage;
  }

  /**
   * @param mixed $coverImage
   */
  public function setCoverImage($coverImage): void
  {
    $this->coverImage = $coverImage;
  }

  /**
   * @return mixed
   */
  public function getRooms()
  {
    return $this->rooms;
  }

  /**
   * @param mixed $rooms
   */
  public function setRooms($rooms): void
  {
    $this->rooms = $rooms;
  }


}
