<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Entity\Image;
use App\Form\AdType;
use App\Repository\AdRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class AdController extends AbstractController
{
  /**
   * @Route("/ads", name="ads_index")
   * @param AdRepository $repo
   * @param SessionInterface $session
   * @return Response
   */
  public function index(AdRepository $repo, SessionInterface $session)
  {
    // dump($session);
    $ads = $repo->findAll();

    return $this->render('ad/index.html.twig', [
      'ads' => $ads,
    ]);
  }


  /**
   * @Route("/ads/new", name="ad_create")
   * @param Request $request
   * @param ObjectManager $manager
   * @return Response
   */
  public function create(Request $request, ObjectManager $manager)
  {
    $ad = new Ad();

    $form = $this->createForm(AdType::class, $ad);

    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()) {

      foreach ($ad->getImages() as $image) {
        $image->setAd($ad);
        $manager->persist($image);
      }

      // Sauvegarder en base de données :
      $manager->persist($ad);
      $manager->flush();

      $this->addFlash(
        'success',
        "L'annonce <strong>{$ad->getTitle()}</strong> a bien été enregistrée !"
      );

      return $this->redirectToRoute('ads_show', [
        'slug' => $ad->getSlug()
      ]);
    }

    return $this->render('ad/new.html.twig', [
      'form' => $form->createView()
    ]);
  }

  /**
   * @Route("/ads/{slug}/edit", name="ads_edit")
   * @param Request $request
   * @param ObjectManager $manager
   * @param Ad $ad
   * @return Response
   */
  public function edit(Request $request, ObjectManager $manager, Ad $ad)
  {
    $form = $this->createForm(AdType::class, $ad);

    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()) {

      foreach ($ad->getImages() as $image) {
        $image->setAd($ad);
        $manager->persist($image);
      }

      $manager->persist($ad);
      $manager->flush();

      $this->addFlash(
        'success',
        "Les modifications de l'annonce <strong>{$ad->getTitle()}</strong> ont bien été enregistrées !"
      );

      return $this->redirectToRoute('ads_show', [
        'slug' => $ad->getSlug()
      ]);
    }

    return $this->render('ad/edit.html.twig', [
      'form' => $form->createView(),
      'ad' => $ad
    ]);
  }


  /**
   * Permet d'afficher une seule annonce
   *
   * @Route("/ads/{slug}", name="ads_show")
   *
   * @param $slug
   * @param Ad $ad
   * @return Response
   */
  public function showAction($slug, Ad $ad)
  {
    return $this->render('ad/show.html.twig', [
      'ad' => $ad
    ]);
  }


}
