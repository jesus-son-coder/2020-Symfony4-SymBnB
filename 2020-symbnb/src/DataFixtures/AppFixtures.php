<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
  /**
   * @param ObjectManager $manager
   */
  public function load(ObjectManager $manager)
  {
    $ad = new Ad();
    $ad->setTitle("Titre de l'annonce")
        ->setSlug("titre-de-l-annonce")
        ->setCoverImage("http://placehold.it/1000x300")
        ->setIntroduction("Bonjour à tous c'est une introduction")
        ->setContent("<p>Je suis un contenu riche !</p>")
        ->setPrice(80)
        ->setRooms(3)
    ;
    $manager->persist($ad);
    $manager->flush();
  }
}
