<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
  /**
   * @param ObjectManager $manager
   */
  public function load(ObjectManager $manager)
  {
    $faker = Factory::create('FR-fr');

    for($i = 1; $i <= 30; $i++) {
      $ad = new Ad();

      $title = $faker->sentence();
      // $coverImage = $faker->imageUrl(1000,350);
      $city = ['paris', 'new-york', 'los-angeles', 'london', 'mexico', 'brazil', 'argentina', 'egypt', 'tokyo', 'china', 'amsterdam', 'miami', 'chicago', 'toronto', 'montreal', 'sydney', 'san-francisco', 'honolulu'];
      $coverImage = "https://loremflickr.com/600/400/" . $city[mt_rand(0,17)] . ",city,house" . "/all?random=".mt_rand(1,20);

      $introduction = $faker->paragraph(2);
      $content = '<p>' . join('</p><p>', $faker->paragraphs(5)) . '</p>';

      $ad->setTitle($title)
        ->setCoverImage($coverImage)
        ->setIntroduction($introduction)
        ->setContent($content)
        ->setPrice(mt_rand(40,200))
        ->setRooms(mt_rand(1,5))
      ;

      for($j=1; $j <= mt_rand(2,5); $j++) {
        $image = new Image();
        $housePicture = "https://loremflickr.com/600/400/" . $city[mt_rand(0,17)] . ",home" . "/all?random=".mt_rand(1,20);
        $image->setUrl($housePicture)
          ->setCaption($faker->sentence())
          ->setAd($ad);
        $manager->persist($image);
      }
      $manager->persist($ad);
    }

    $manager->flush();
  }
}
